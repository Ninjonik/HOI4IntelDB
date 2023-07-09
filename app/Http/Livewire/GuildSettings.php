<?php

namespace App\Http\Livewire;

use App\Models\Settings;
use Livewire\Component;
use GuzzleHttp\Client;

class GuildSettings extends Component
{
    public $id_guild;
    public $guild_id;
    public $guild_name;
    public $guild_desc;
    public $steam_verification;
    public $data;
    public $log_channel;

    protected $rules = [
        'guild_name' => 'required|min:6',
        'guild_desc' => '',
        'steam_verification' => 'required',
        'log_channel' => '',
    ];

    public function submit()
    {
        $this->validate();

        $data = Settings::find($this->id_guild);
        $data->guild_name = $this->guild_name;
        $data->guild_desc = $this->guild_desc;
        $data->steam_verification = $this->steam_verification;
        $data->log_channel = $this->log_channel;
        $data->save();

        $client = new Client();
        $response = $client->patch(env('COMMS_URL').'/edit/guild', [
            'json' => [
                'token' => env("COMMS_TOKEN"),
                'guild_id' => $data->guild_id,
                'guild_name' => $this->guild_name,
                'guild_desc' => $this->guild_desc,
            ],
        ]);

        if ($response->getStatusCode() === 200) {
            $responseData = json_decode($response->getBody(), true);
            $this->DispatchBrowserEvent("guild-edited");
        } else {
            $responseData = json_decode($response->getBody(), true);
            $this->DispatchBrowserEvent("guild-not-edited");
        }

        $this->data = $data;
    }

    public function mount($id)
    {
        $this->id_guild = $id;
        $this->loadData();
    }

    public function loadData()
    {
        $this->data = Settings::find($this->id_guild);
        $this->guild_name = $this->data->guild_name;
        $this->guild_desc = $this->data->guild_desc;
        $this->steam_verification = $this->data->steam_verification;
        $this->log_channel = str($this->data->log_channel);
    }

    public function render()
    {
        // Fetch channel data from the API
        $client = new Client();
        $response = $client->get(env('COMMS_URL') . '/get/guild/channels', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'token' => env("COMMS_TOKEN"),
                'guild_id' => $this->data->guild_id,
            ],
        ]);
        if ($response->getStatusCode() === 200) {
            $channelData = json_decode($response->getBody(), true);
            $channels = $channelData;
        } else {
            $channels = [];
        }
        return view('livewire.guild-settings', ['data' => $this->data, 'channels' => $channels])->layout('livewire.layouts.base');
    }

}
