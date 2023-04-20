<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Players;
use Livewire\WithPagination;

class PlayersIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $data = Players::paginate(10);

        return view('livewire.players-index', ["data"=>$data])->layout('livewire.layouts.base');
    }

}
