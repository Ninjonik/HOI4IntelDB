<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use App\Models\Ban;
use Livewire\WithPagination;
use GetName;
use Bouncer;

class UsersIndex extends Component
{
    public $id_delete;
    public $id_ban;
    public $id_edit;
    public $id_user;
    public $id_group;
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

        return view('livewire.users-index', [
            'data' => $data,
            'roles2' => $roles2
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

    // EDIT

    public function editData()
    {
        $user = User::find($this->id_user);

        $user->roles()->detach();
        if (!empty($this->id_group)) $user->assign($this->id_group);

        $this->DispatchBrowserEvent("updated");
        $this->DispatchBrowserEvent("close-modal");

        $this->resetInputs();
    }

    public function edit($id)
    {
        $this->id_user = $id;
        $this->dispatchBrowserEvent("show-edit-modal");
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
