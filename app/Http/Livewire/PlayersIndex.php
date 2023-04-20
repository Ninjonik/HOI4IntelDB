<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Players;
use Livewire\WithPagination;

class PlayersIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function render()
    {
        $data = Players::when($this->search, function($query, $search) {
            return $query->where('profile_link', 'like', '%'.$search.'%')
                ->orWhere('discord_id', 'like', '%'.$search.'%');
        })
            ->paginate(10);

        return view('livewire.players-index', ["data"=>$data])->layout('livewire.layouts.base');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
}
