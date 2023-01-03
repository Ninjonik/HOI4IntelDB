<?php

namespace App\Http\Livewire;

use App\Models\Settings;
use Livewire\Component;

// TODO: VIEW

class GuildsComponent extends Component
{
    public $guildId, $serverName, $serverDescription, $guild_edit_id, $guild_delete_id;
    protected $listeners = ['refreshGuilds' => 'render'];

    //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'guildId' => 'required|unique:settings,guildId,'.$this->guild_edit_id, //settings = table name, validation with ignoring own data
            'serverName' => 'required',
            'serverDescription' => 'required',
        ]);
    }

    public function render()
    {
        $guilds = Settings::all();

        echo "seva";

        return view('livewire.guilds-component', ["guilds"=>$guilds])->layout('livewire.layouts.base');
    }

    public function resetInputs()
    {
        $this->guildId = "";
        $this->serverName = "";
        $this->serverDescription = "";
        $this->guild_edit_id = "";
    }

    public function editGuildData()
    {
        $this->validate([
            'guildId' => 'required|unique:settings,guildId,'.$this->guild_edit_id, //settings = table name, validation with ignoring own data
            'serverName' => 'required',
            'serverDescription' => 'required',
        ]);

        //Edit Guild Data
        $guild = Settings::where("id", $this->guild_edit_id)->first();
        $guild->guildId = $this->guildId;
        $guild->serverName = $this->serverName;
        $guild->serverDescription = $this->serverDescription;
        $guild->save();

        $this->resetInputs();

        //Hide modal after add guild success
        $this->DispatchBrowserEvent("guild-updated");
        $this->DispatchBrowserEvent("close-modal");
    }

    public function editGuild($id)
    {
        $guild = Settings::where("id", $id)->first();

        $this->guild_edit_id = $guild->id;
        $this->guildId = $guild->guildId;
        $this->serverName = $guild->serverName;
        $this->serverDescription = $guild->serverDescription;

        $this->dispatchBrowserEvent("show-edit-guild-modal");
    }

    public function storeGuildData()
    {
        // on form submit validation
        $this->validate([
            'guildId' => 'required|unique:settings', //settings = table name
            'serverName' => 'required',
            'serverDescription' => 'required',
        ]);

        //Add Guild Data
        $guild = new Settings();
        $guild->guildId = $this->guildId;
        $guild->serverName = $this->serverName;
        $guild->serverDescription = $this->serverDescription;

        $guild->save();

        $this->resetInputs();

        event(new \App\Events\GuildRefreshEvent());

        //Hide modal after add guild success
        $this->DispatchBrowserEvent("guild-added");
        $this->DispatchBrowserEvent("close-modal");

    }

    public function cancel()
    {
        $this->guild_delete_id = "";
    }

    public function deleteConfirmation($id)
    {
        $this->guild_delete_id = $id;

        $this->DispatchBrowserEvent("show-delete-guild-modal");
    }

    public function deleteGuildData()
    {
        $guild = Settings::where("id", $this->guild_delete_id)->first();
        $guild->delete();
        $this->DispatchBrowserEvent("guild-removed");
        $this->DispatchBrowserEvent("close-modal");
    }


}
