<?php

namespace App\Http\Livewire;

use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use App\Models\Ban;
use Livewire\WithPagination;
use GetName;
use Bouncer;
use Illuminate\Support\Facades\Cache;

class UsersIndex extends Component
{
    public $id_delete;
    public $id_ban;
    public $id_edit;
    public $id_user;
    public $id_group;
    public $id_guild;
    public $guilds_data = [];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function render()
    {
        $data = User::when($this->search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('discord_id', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        })
            ->with('ban')
            ->paginate(10);

        $data->each(function ($player) {
            $player->isBanned = $player->ban ? true : false;
            $player->banHost = $player->ban ? $player->ban->host_id : null;
            $player->banCreatedAt = $player->ban ? $player->ban->created_at : null;
        });

        $roles2 = Bouncer::role()->all();

        $guilds = Cache::get('players_guilds_data');
        if (!$guilds) {
            $guilds = Settings::all();
            Cache::put('players_guilds_data', $guilds, 360); // Cache the data for 60 minutes
        }

        return view('livewire.users-index', [
            'data' => $data,
            'roles2' => $roles2,
            'guilds' => $guilds
        ])->layout('livewire.layouts.base');
    }

    public function cancel()
    {
        $this->id_delete = "";
        $this->id_ban = "";
        $this->id_user = "";
        $this->id_edit = "";
        $this->dispatchBrowserEvent("close-modal");
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function resetInputs()
    {
        $this->id_ban = "";
        $this->id_delete = "";
        $this->id_user = "";
        $this->id_edit = "";
    }

    // EDIT ROLE

    public function editData()
    {
        $user = User::find($this->id_user);

        $user->roles()->detach();
        if ($this->id_group !== null) $user->assign($this->id_group);

        $this->DispatchBrowserEvent("updated");
        $this->DispatchBrowserEvent("close-modal");

        $this->resetInputs();
    }

    public function edit($id)
    {
        $this->id_user = $id;
        $this->dispatchBrowserEvent("show-edit-modal");
    }

    // EDIT GUILDS

    public function editGuildsData()
    {
        // Serialize the selected guild IDs
        $serializedGuilds = json_encode($this->id_guild);

        // Update the user's guilds field with serialized guild IDs
        $user = User::find($this->id_user);
        $user->guilds = $serializedGuilds;
        $user->save();

        // Dispatch browser events
        $this->dispatchBrowserEvent("updated");
        $this->dispatchBrowserEvent("close-modal");

        // Reset inputs
        $this->resetInputs();
    }


    public function editGuilds($id)
    {
        $this->id_user = $id;
        // Fetch and update the guilds_data
        $user = User::find($this->id_user);
        if($user->guilds){
            $guilds = json_decode($user->guilds);
            $this->guilds_data = Settings::whereIn('id', $guilds)->get();
        }

        $this->dispatchBrowserEvent("show-guilds-modal");
    }

    // BAN

    public function banConfirmation($id)
    {
        $this->id_ban = $id;
        $this->DispatchBrowserEvent("show-ban-modal");
    }

    public function banData()
    {
        $this->id_ban = intval($this->id_ban);
        $ban = Ban::where('player_id', $this->id_ban)->first();
        if ($ban) {
            $ban->delete();
        } else {
            if($this->id_ban) {
                $ban = new Ban();
                $ban->player_id = $this->id_ban;
                $ban->host_id = intval(Auth::user()->discord_id);
                // TODO: Hardcoded for now
                $ban->guild_id = 1035627488828735518;
                $ban->save();
            }
        }

        $this->resetInputs();
        $this->dispatchBrowserEvent("banned");
        $this->dispatchBrowserEvent("close-modal");
    }


    // DELETE

    public function deleteConfirmation($id)
    {
        $this->id_delete = $id;
        $this->DispatchBrowserEvent("show-delete-modal");
    }

    public function deleteData()
    {
        $data = Players::where("id", $this->id_delete)->first();
        if ($data) {
            $discord_id = $data->discord_id;
            PlayerRecords::where("player_id", $discord_id)->delete();
            $data->delete();
        }
        $this->resetInputs();
        $this->DispatchBrowserEvent("removed");
        $this->DispatchBrowserEvent("close-modal");
    }

}
