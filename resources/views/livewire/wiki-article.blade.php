
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <button type="button" class="btn btn-primary" id="add">
                            Add New Article
                        </button>
                    </div>
                </div>
            </div>

            <div wire:ignore.self class="modal fade" id="modal">
                <div class="modal-dialog modal-lg">
                    <form wire:submit.prevent="store">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create new Article</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title" class="col-3">Article Title</label>
                                    <input type="text" id="title" class="form-control" wire:model="title">
                                    @error("title")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tags" class="col-3">Article Tags</label>
                                    <input type="text" id="tags" class="form-control" wire:model="tags">
                                    @error("tags")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="content" class="col-3">Article Content</label>
                                    <textarea id="content" class="form-control" wire:model="content"></textarea>
                                    @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Article Thumbnail</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" wire:model="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    @error("image")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Article Category</label>
                                    <select class="form-control" style="width: 100%;" name="category" wire:model="category">
                                        @foreach($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                                        @endforeach
                                    </select>
                                    @error("category")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div wire:ignore.self class="modal fade" id="delete-modal">
                <div class="modal-dialog">
                    <form wire:submit.prevent="deleteData">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete Confirmation</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h6>Are you sure you want to delete this article?</h6>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" wire:click="cancel()" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" wire:click="deleteData()">Yes, delete.</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="data">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Edit Author</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($data->count() > 0)
                        @foreach($data as $unit)
                            <tr>
                                <th>{{ $unit->id }}</th>
                                <th>{{ $unit->title }}</th>
                                <th>{{ $unit->tags }}</th>
                                <th>{{ $unit->image }}</th>
                                <th>{{ $unit->category }}</th>
                                <th>{{ $unit->author }}</th>
                                <th>{{ $unit->edit_author }}</th>
                                <th>{{ $unit->created_at }}</th>
                                <th>{{ $unit->updated_at }}</th>
                                <th>
                                    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" wire:click="edit({{ $unit->id }})">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </button>
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" wire:click="deleteConfirmation({{ $unit->id }})">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>
                                </th>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" style="text-align: center;"><small>No Article Found</small></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set('content', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
</script>
