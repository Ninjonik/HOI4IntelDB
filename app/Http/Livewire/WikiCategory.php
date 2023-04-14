<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\WikiCategory as WikiCategoryDB;

class WikiCategory extends Component
{

    public $data_id, $title, $description, $icon, $order, $id_edit, $id_delete;

    protected $messages = [
        'required' => 'This field cannot be empty.',
    ];

    // GENERAL

    //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'order' => ['required', 'numeric', 'min:0'],
        ]);
    }

    public function render()
    {
        $data = WikiCategoryDB::all();

        return view('livewire.wiki-category', ["data"=>$data])->layout('livewire.layouts.base');
    }

    public function resetInputs()
    {
        $this->data_id = "";
        $this->title = "";
        $this->description = "";
        $this->icon = "";
        $this->order = "";
        $this->id_delete = "";
        $this->id_edit = "";
    }

    public function cancel()
    {
        $this->id_delete = "";
    }

    // ADD

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'order' => ['required', 'numeric', 'min:0'],
        ]);

        $con = new WikiCategoryDB();
        $con->title = $this->title;
        $con->description = $this->description;
        $con->icon = $this->icon;
        $con->order = $this->order;

        $con->save();

        $this->resetInputs();

        $this->DispatchBrowserEvent("close-modal");
        $this->DispatchBrowserEvent("added");

    }

    // UPDATE

    public function editData()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'order' => ['required', 'numeric', 'min:0'],
        ]);

        $con = WikiCategoryDB::where("id", $this->id_edit)->first();
        $con->title = $this->title;
        $con->description = $this->description;
        $con->icon = $this->icon;
        $con->order = $this->order;
        $con->save();

        $this->resetInputs();

        $this->DispatchBrowserEvent("updated");
        $this->DispatchBrowserEvent("close-modal");
    }

    public function edit($id)
    {
        $con = WikiCategoryDB::where("id", $id)->first();

        $this->id_edit = $con->id;

        $this->title = $con->title;
        $this->description = $con->description;
        $this->icon = $con->icon;
        $this->order = $con->order;

        $this->dispatchBrowserEvent("show-edit-modal");
    }

    // DELETE

    public function deleteConfirmation($id)
    {
        $this->id_delete = $id;
        $this->DispatchBrowserEvent("show-delete-modal");
    }

    public function deleteData()
    {
        $data = WikiCategoryDB::where("id", $this->id_delete)->first();
        if ($data) {
            // Delete all related articles
            WikiArticle::where('category_id', $data->id)->delete();

            // Delete the category
            $data->delete();
        }
        $this->dispatchBrowserEvent("removed");
        $this->dispatchBrowserEvent("close-modal");
    }


}
