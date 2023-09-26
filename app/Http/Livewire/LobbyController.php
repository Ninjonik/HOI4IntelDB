<?php

namespace App\Http\Livewire;

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

    public function mount($guild_id, $id)
    {
        $this->guild_id = (string) $guild_id;
        $this->lobby_id = (string) $id;
    }

    public function render()
    {
        $playerRecords = [];
        $this->event = GuildEvents::where('voice_channel_id', intval($this->lobby_id))
            ->orderBy('id', 'desc')
            ->first();
        return view('livewire.lobby', ['guild_id' => $this->guild_id, 'lobby_id' => $this->lobby_id, 'playerRecords' => $playerRecords, 'event' => $this->event])->layout('livewire.layouts.base');
    }

    public function fetchLobbyData()
    {
        $client = new Client();
        $response = $client->get(env('COMMS_URL').'/get/lobby', [
            'json' => [
                'token' => env("COMMS_TOKEN"),
                'lobby_id' => str($this->lobby_id),
            ],
        ]);

        if ($response->getStatusCode() === 200) {
            $responseData = json_decode($response->getBody(), true);
        } else {
            $responseData = json_decode($response->getBody(), true);
        }

        $this->lobbyData = $responseData;
        return $responseData;
    }

    public function saveLobbyData()
    {

        $this->dispatchBrowserEvent('show-success-toast');

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

}
