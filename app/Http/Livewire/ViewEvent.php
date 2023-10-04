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
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

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
}
