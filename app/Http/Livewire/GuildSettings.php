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
    public $custom_channel;
    public $custom_channel_2;
    public $wuilting_channel_id;
    public $verify_role;
    public $tts;
    public $minimal_age;

    protected $rules = [
        'guild_name' => 'required|min:6',
        'guild_desc' => '',
        'steam_verification' => 'required',
        'log_channel' => '',
        'custom_channel' => '',
        'custom_channel_2' => '',
        'wuilting_channel_id' => '',
        'verify_role' => '',
        'tts' => '',
        'minimal_age' => 'required|int|min:0'
    ];

    public function submit()
    {
//        $this->validate();

        $data = Settings::where('guild_id', intval($this->id_guild))->first();
        $data->guild_name = $this->guild_name;
        $data->guild_desc = $this->guild_desc;
        $data->steam_verification = $this->steam_verification;
        // TODO: Do verification for empty channels and add option to remove channels
        $data->log_channel = $this->log_channel;
        $data->custom_channel = $this->custom_channel;
        $data->custom_channel_2 = $this->custom_channel_2;
        $data->wuilting_channel_id = $this->wuilting_channel_id;
        $data->verify_role = $this->verify_role;
        $data->tts = $this->tts;
        $data->minimal_age = $this->minimal_age;
        $data->save();

        $client = new Client();
        $response = $client->patch(env('COMMS_URL').'/edit/guild', [
            'json' => [
                'token' => env("COMMS_TOKEN"),
                'guild_id' => $data->guild_id,
                'guild_name' => $this->guild_name,
                'guild_desc' => $this->guild_desc,
                'wuilting_channel_id' => $this->wuilting_channel_id
            ],
        ]);

        if ($response->getStatusCode() === 200) {
            $responseData = json_decode($response->getBody(), true);
            $this->DispatchBrowserEvent("guild-edited");
        } else {
            $responseData = json_decode($response->getBody(), true);
            $this->DispatchBrowserEvent("guild-not-edited");
        }

        //$this->data = $data;
    }

    public function mount($id)
    {
        $this->id_guild = $id;
        $this->loadData();
    }

    public function loadData()
    {
        $this->data = Settings::where('guild_id', intval($this->id_guild))->first();
        $this->guild_name = $this->data->guild_name;
        $this->guild_desc = $this->data->guild_desc;
        $this->steam_verification = $this->data->steam_verification;
        $this->log_channel = str($this->data->log_channel);
        $this->custom_channel = str($this->data->custom_channel);
        $this->custom_channel_2 = str($this->data->custom_channel_2);
        $this->wuilting_channel_id = str($this->data->wuilting_channel_id);
        $this->verify_role = str($this->data->verify_role);
        $this->tts = $this->data->tts;
        $this->minimal_age = $this->data->minimal_age;
    }

    public function render()
    {
        $client = new Client();
        $response = $client->get(env('COMMS_URL') . '/get/guild/channels', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'token' => env("COMMS_TOKEN"),
                'guild_id' => $this->data->guild_id,
                'voice' => true,
                'text' => true
            ],
        ]);
        if ($response->getStatusCode() === 200) {
            $channelData = json_decode($response->getBody(), true);
            $channels = $channelData["text"];
            $voice_channels = $channelData["voice"];
        } else {
            $channels = [];
            $voice_channels = [];
        }

        $roles_response = $client->get(env('COMMS_URL') . '/get/guild/roles', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'token' => env("COMMS_TOKEN"),
                'guild_id' => $this->data->guild_id
            ],
        ]);
        if ($roles_response->getStatusCode() === 200) {
            $roles_channelData = json_decode($roles_response->getBody(), true);
            $roles = $roles_channelData;
        } else {
            $roles = [];
        }

        return view('livewire.guild-settings', ['data' => $this->data, 'channels' => $channels, 'voice_channels' => $voice_channels, 'roles' => $roles])->layout('livewire.layouts.base');
    }

}
