<?php

namespace App\Http\Livewire;

use App\Models\Settings;
use Livewire\Component;

class GuildSettings extends Component
{
    public $guild_id;
    public $guild_name;
    public $guild_desc;
    public $steam_verification;
    public $data;

    protected $rules = [
        'guild_name' => 'required|min:6',
        'guild_desc' => '',
        'steam_verification' => 'required',
    ];

    public function submit()
    {
        $this->validate();

        $data = Settings::find($this->guild_id);
        $data->guild_name = $this->guild_name;
        $data->guild_desc = $this->guild_desc;
        $data->steam_verification = $this->steam_verification;
        $data->save();

        $this->data = $data;
    }

    public function mount($id)
    {
        $this->guild_id = $id;
        $this->loadData();
    }

    public function loadData()
    {
        $this->data = Settings::find($this->guild_id);
        $this->guild_name = $this->data->guild_name;
        $this->guild_desc = $this->data->guild_desc;
        $this->steam_verification = $this->data->steam_verification;
    }

    public function render()
    {
        return view('livewire.guild-settings', [
            'data' => $this->data,
        ])->layout('livewire.layouts.base');
    }

}
