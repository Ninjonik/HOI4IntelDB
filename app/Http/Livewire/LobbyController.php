<?php

namespace App\Http\Livewire;

use App\Models\PlayerRecords;
use Livewire\Component;

class LobbyController extends Component
{
    public $guild_id;
    public $lobby_id;

    public function mount($guild_id, $id)
    {
        $this->guild_id = (string) $guild_id;
        $this->lobby_id = (string) $id;
    }

    public function render()
    {
        $playerRecords = [];
        return view('livewire.lobby', ['guild_id' => $this->guild_id, 'lobby_id' => $this->lobby_id, 'playerRecords' => $playerRecords])->layout('livewire.layouts.base');
    }


    public function viewRecords($playerId)
    {
        $playerId = intval($playerId);
        $this->playerRecords = PlayerRecords::where('player_id', $playerId)->with('host')->with('guild')->get();
        $this->dispatchBrowserEvent("openPlayerRecordsModal");
    }
}
