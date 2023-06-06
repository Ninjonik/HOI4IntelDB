<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Players;
use App\Models\PlayerRecords;
use Livewire\WithPagination;

class PlayersIndex extends Component
{
    public $id_delete;
    public $id_ban;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function render()
    {
        $data = Players::when($this->search, function($query, $search) {
            return $query->where('profile_link', 'like', '%'.$search.'%')
                ->orWhere('discord_id', 'like', '%'.$search.'%')
                ->orWhere('discord_name', 'like', '%'.$search.'%');
        })
            ->paginate(10);

        return view('livewire.players-index', ["data"=>$data])->layout('livewire.layouts.base');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    // BAN

    public function banConfirmation($id)
    {
        $this->id_ban = $id;
        $this->DispatchBrowserEvent("show-ban-modal");
    }

    public function banData()
    {
        $data = Players::where("id", $this->id_ban)->first();
        // TODO: Fix, behaves very weirdly
        if ($data["status"] == 0) {
            Players::where('id',$this->id_ban)->update(['status'=>2]);
        } else {
            Players::where('id',$this->id_ban)->update(['status'=>0]);
        }
        $this->DispatchBrowserEvent("banned");
        $this->DispatchBrowserEvent("close-modal");
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
        $this->DispatchBrowserEvent("removed");
        $this->DispatchBrowserEvent("close-modal");
    }

}
