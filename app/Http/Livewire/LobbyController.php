<?php

namespace App\Http\Livewire;

use App\Models\EventReservation;
use App\Models\PlayerNotes;
use App\Models\PlayerRecords;
use App\Models\Event as GuildEvents;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class LobbyController extends Component
{
    public $guild_id;
    public $lobby_id;
    public $event = [];
    public $lobbyData = [];
    public $id_view;
    public $player_note;

    public function mount($id, $lobby_id)
    {
        $this->guild_id = (string) $id;
        $this->lobby_id = (string) $lobby_id;
    }

    public function render()
    {
        $playerRecords = [];
        $this->event = GuildEvents::where('voice_channel_id', intval($this->lobby_id))
            ->orderBy('id', 'desc')
            ->first();

        $playerRecords = [];
        $playerNotes = [];

        return view('livewire.lobby',
            [
                'guild_id' => $this->guild_id,
                'lobby_id' => $this->lobby_id,
                'playerRecords' => $playerRecords,
                'event' => $this->event,
                'playerRecords' => $playerRecords,
                'playerNotes' => $playerNotes,
            ]
        )->layout('livewire.layouts.base');
    }

    public function fetchLobbyData()
    {
        $client = new Client();

        try {
            $response = $client->get(env('COMMS_URL').'/get/lobby', [
                'json' => [
                    'token' => env("COMMS_TOKEN"),
                    'lobby_id' => str($this->lobby_id),
                ],
            ]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $this->dispatchBrowserEvent('pl-refresh-error');
            return [];
        }

        $responseData = json_decode($response->getBody(), true);

        $this->lobbyData = $responseData;
        $this->dispatchBrowserEvent('pl-show-refresh-toast');
        return $responseData;
    }

    public function saveLobbyData()
    {

        // $players = $this->fetchLobbyData();
        $players = $this->lobbyData;

        if ($this->event) {
            $countries = [];
            foreach ($players as $player) {
                $discordId = $player['user']['discord_id'];
                $country = $player['user']['country'];
                $countries[$discordId] = $country;
            }
            $this->event->countries = json_encode($countries);
            $this->event->save();
        }

        $this->dispatchBrowserEvent('pl-show-success-toast');
    }

    protected $listeners = ['playerJoined', 'playerLeft'];

    public function playerJoined($player)
    {
        $this->lobbyData[$player['discord_id']] = ['user' => $player];
    }


    public function playerLeft($discord_id)
    {
        unset($this->lobbyData[$discord_id]);
    }

    // END OF LOBBY

    // RECORDS

    public function submit()
    {
        $con = new PlayerNotes();
        $con->player_id = $this->id_view;
        $con->guild_id = 0;
        $con->host_id = \Auth::user()->discord_id;
        $con->note = $this->player_note;
        $con->save();

        $this->DispatchBrowserEvent("added");
        $this->dispatchBrowserEvent("close-modal");

    }

    public function viewRecords($playerId)
    {
        $this->id_view = $playerId;
        $playerId = intval($playerId);
        $this->playerRecords = PlayerRecords::where('player_id', $playerId)->with('host')->with('guild')->get();
        $this->playerNotes = PlayerNotes::where('player_id', $playerId)->with('host')->with('guild')->get();
        $this->dispatchBrowserEvent("openPlayerRecordsModal");
    }

    public function cancel()
    {
        $this->id_delete = "";
        $this->id_ban = "";
        $this->dispatchBrowserEvent("close-modal");
    }

    public function deleteNote($id)
    {
        $data = PlayerNotes::where("id", $id)->first();
        $data->delete();
        $this->DispatchBrowserEvent("removed");
        $this->DispatchBrowserEvent("close-modal");
    }

    // DELETE

    public function deleteReservation($reservation_id)
    {
        $data = EventReservation::where("id", $reservation_id)->first();
        if ($data) {
            $data->delete();
        }
        $this->DispatchBrowserEvent("removed");
    }

}
