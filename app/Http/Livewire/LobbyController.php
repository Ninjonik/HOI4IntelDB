<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LobbyController extends Component
{
    public function render()
    {
        return view('livewire.lobby')->layout('livewire.layouts.base');;
    }

}
