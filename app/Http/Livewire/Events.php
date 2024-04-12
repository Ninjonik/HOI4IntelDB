<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Events extends Component
{

    public $guild_id;
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount($id)
    {
        $this->guild_id = $id;
    }

    public function render()
    {

        $events_data = Event::when($this->search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('host_id', 'like', '%' . $search . '%')
                ->orWhere('voice_channel_id', 'like', '%' . $search . '%');
        })
            ->where('guild_id', intval($this->guild_id))
            ->with('user')
            ->orderBy('id', 'desc')
            ->paginate(10);

        $labels_datasets = Cache::get("labels_datasets_$this->guild_id");
        if (!$labels_datasets) {
            // Get the last 14 days
            $last14Days = [];
            for ($i = 13; $i >= 0; $i--) {
                $date = date('Y-m-d', strtotime("-$i days"));
                $last14Days[] = $date;
            }

            $results = Event::select(
                DB::raw("COUNT(guild_id) as count"),
                DB::raw("DATE(updated_at) as date"),
                DB::raw("host_id")
            )
                ->where('guild_id', intval($this->guild_id))
                ->where('updated_at', '>=', end($last14Days) . ' 00:00:00') // Filter events within the last 14 days
                ->orderBy('id', 'desc')
                ->groupBy(DB::raw("date(updated_at)"), 'host_id') // Group by date and host_id
                ->get();

            $hostData = [];

            foreach ($last14Days as $day) {
                foreach ($results as $result) {
                    $hostId = $result->host_id;
                    $date = $result->date;
                    $count = $result->count;

                    if (!isset($hostData[$hostId])) {
                        $hostData[$hostId] = [
                            'label' => 'Host ' . $hostId,
                            'backgroundColor' => 'rgb(255, 99, 132)',
                            'borderColor' => 'rgb(255, 99, 132)',
                            'data' => [],
                        ];
                    }

                    // Check if the host hosted on the current day, set count, otherwise set 0
                    if ($date == $day) {
                        $hostData[$hostId]['data'][] = $count;
                    } else {
                        $hostData[$hostId]['data'][] = 0;
                    }
                }
            }

            $labels = array_reverse($last14Days);
            $datasets = array_values($hostData);

            $labels_datasets = [$labels, $datasets];
            Cache::put("labels_datasets_$this->guild_id", $labels_datasets, 720 * 24);
        } else {
            $labels = $labels_datasets[0];
            $datasets = $labels_datasets[1];
        }

        return view('livewire.events', [
            'events_data' => $events_data,
            'labels' => $labels,
            'datasets' => $datasets
        ])->layout('livewire.layouts.base');
    }


}
