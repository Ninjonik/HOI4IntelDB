<?php

namespace App\Http\Livewire;

use App\Models\WikiArticle as WikiArticleDB;
use Livewire\Component;
use Livewire\WithFileUploads;

class WikiArticle extends Component
{
    public $data_id, $title, $tags, $content, $image, $category, $categories, $id_edit, $id_delete;

    protected $messages = [
        'required' => 'This field cannot be empty.',
    ];

    use WithFileUploads;

    // GENERAL

    //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'tags' => 'required',
            'content' => 'required',
            'category' => 'required',
            'image' => 'image|max:8192',
        ]);
    }

    public function mount()
    {
        $this->categories = \App\Models\WikiCategory::all();
        $this->category = $this->categories->min('id');
    }

    public function render()
    {
        $data = WikiArticleDB::all();

        return view('livewire.wiki-article', ["data"=>$data, "categories"=>$this->categories])->layout('livewire.layouts.base');
    }

    public function resetInputs()
    {
        $this->data_id = "";
        $this->title = "";
        $this->tags = "";
        $this->content = "";
        $this->image = "";
        $this->category = "";
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
            'tags' => 'required',
            'content' => 'required',
            'category' => 'required',
            'image' => 'image|max:8192',
        ]);

        $this->category = intval($this->category);
        $con = new WikiArticleDB();
        $con->title = $this->title;
        $con->tags = $this->tags;
        $con->content = $this->content;
        $con->image = 'AT_' . time() . '.png';
        $con->category_id = $this->category;
        $con->author_id = \Auth::id();
        $con->edit_author_id = \Auth::id();
        $con->save();
        $this->image->storeAs('article_thumbnails', 'AT_' . time() . '.png');


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

        $con = WikiArticleDB::where("id", $this->id_edit)->first();
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
        $con = WikiArticleDB::where("id", $id)->first();

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
        $data = WikiArticleDB::where("id", $this->id_delete)->first();
        if ($data) {
            $data->delete();
        }
        $this->DispatchBrowserEvent("removed");
        $this->DispatchBrowserEvent("close-modal");
    }
}
