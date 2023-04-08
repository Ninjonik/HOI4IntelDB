<?php

namespace App\Http\Livewire;

use App\Models\Settings;
use Livewire\Component;

// TODO: VIEW

class GuildsComponent extends Component
{
    public $guild_id, $guild_name, $guild_desc, $guild_edit_id, $guild_delete_id;

    //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'guild_id' => 'required|unique:settings,guild_id,'.$this->guild_edit_id, //settings = table name, validation with ignoring own data
            'guild_name' => 'required',
            'guild_desc' => 'required',
        ]);
    }

    public function render()
    {
        $guilds = Settings::all();

        return view('livewire.guilds-component', ["guilds"=>$guilds])->layout('livewire.layouts.base');
    }

    public function resetInputs()
    {
        $this->guild_id = "";
        $this->guild_name = "";
        $this->guild_desc = "";
        $this->guild_edit_id = "";
    }

    public function editGuildData()
    {
        $this->validate([
            'guild_id' => 'required|unique:settings,guild_id,'.$this->guild_edit_id, //settings = table name, validation with ignoring own data
            'guild_name' => 'required',
            'guild_desc' => 'required',
        ]);

        //Edit Guild Data
        $guild = Settings::where("id", $this->guild_edit_id)->first();
        $guild->guild_id = $this->guild_id;
        $guild->guild_name = $this->guild_name;
        $guild->guild_desc = $this->guild_desc;
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
        $this->guild_id = $guild->guild_id;
        $this->guild_name = $guild->guild_name;
        $this->guild_desc = $guild->guild_desc;

        $this->dispatchBrowserEvent("show-edit-guild-modal");
    }

    public function storeGuildData()
    {
        // on form submit validation
        $this->validate([
            'guild_id' => 'required|unique:settings', //settings = table name
            'guild_name' => 'required',
            'guild_desc' => 'required',
        ]);

        //Add Guild Data
        $guild = new Settings();
        $guild->guild_id = $this->guild_id;
        $guild->guild_name = $this->guild_name;
        $guild->guild_desc = $this->guild_desc;

        $guild->save();

        $this->resetInputs();

        //Hide modal after add guild success
        $this->DispatchBrowserEvent("guild-added");
        // TODO: Doesnt work for some weird reason
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
