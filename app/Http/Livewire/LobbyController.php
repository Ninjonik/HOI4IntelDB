<?php

namespace App\Http\Livewire;

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
        return view('livewire.lobby', ['guild_id' => $this->guild_id, 'lobby_id' => $this->lobby_id])->layout('livewire.layouts.base');
    }
}
