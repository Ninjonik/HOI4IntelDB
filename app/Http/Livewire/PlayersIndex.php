<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Players;
use App\Models\PlayerRecords;
use App\Models\Ban;
use Livewire\WithPagination;
use GetName;

class PlayersIndex extends Component
{
    public $id_delete;
    public $id_ban;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function render()
    {
        $data = Players::when($this->search, function ($query, $search) {
            return $query->where('profile_link', 'like', '%' . $search . '%')
                ->orWhere('discord_id', 'like', '%' . $search . '%')
                ->orWhere('discord_name', 'like', '%' . $search . '%');
        })
            ->with('ban') // Eager load the ban relationship
            ->paginate(10);

        $data->each(function ($player) {
            $player->isBanned = $player->ban ? true : false;
            $player->banHost = $player->ban ? $player->ban->host_id : null;
            $player->banCreatedAt = $player->ban ? $player->ban->created_at : null;
        });

        $playerRecords = [];

        return view('livewire.players-index', [
            'data' => $data,
            'playerRecords' => $playerRecords, // Add this line
        ])->layout('livewire.layouts.base');
    }

    public function viewRecords($playerId)
    {
        $playerId = intval($playerId);
        $this->playerRecords = PlayerRecords::where('player_id', $playerId)->with('host')->with('guild')->get();
        $this->dispatchBrowserEvent("openPlayerRecordsModal");
    }

    public function cancel()
    {
        $this->id_delete = "";
        $this->id_ban = "";
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
