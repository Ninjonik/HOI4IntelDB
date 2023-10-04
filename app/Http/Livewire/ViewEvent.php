<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\PlayerRecords;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ViewEvent extends Component
{
    public $event_id;
    public $search = '';
    public $id_delete;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['updateRating'];

    public function mount($id, $event_id)
    {
        $this->event_id = $event_id;
    }

    public function render()
    {

        $event_data = Event::where('id', '=', $this->event_id)->first();

        $total_rating = 0;
        $player_count = count($event_data->player_records);

        foreach ($event_data->player_records as $player) {
            $total_rating += $player->rating;
        }

        $average_rating = $player_count > 0 ? ($total_rating / $player_count) * 100 : 0;

        return view('livewire.view-event', [
            "event_data" => $event_data,
            "average_rating" => $average_rating
        ])->layout('livewire.layouts.base');
    }

    public function updateRating($params){
        PlayerRecords::where('player_id', intval($params[1]))->update(['rating' => $params[0] / 100]);
        $this->dispatchBrowserEvent('updated');
    }

    public function deleteConfirmation($id)
    {
        $this->id_delete = $id;
        $this->dispatchBrowserEvent("show-delete-modal");
    }

    public function removePlayerRecord(){
        PlayerRecords::where('player_id', $this->id_delete)->delete();
        $this->dispatchBrowserEvent('removed');
    }

    public function cancel()
    {
        $this->id_delete = "";
        $this->dispatchBrowserEvent("close-modal");
    }

}
