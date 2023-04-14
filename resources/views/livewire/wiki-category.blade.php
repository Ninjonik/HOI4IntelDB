
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <button type="button" class="btn btn-primary" id="add">
                            Add New Category
                        </button>
                    </div>
                </div>
            </div>

            <div wire:ignore.self class="modal fade" id="modal">
                <div class="modal-dialog">
                    <form wire:submit.prevent="store">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create new Category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title" class="col-3">Category Title</label>
                                    <input type="text" id="title" class="form-control" wire:model="title">
                                    @error("title")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-3">Category Description</label>
                                    <input type="text" id="description" class="form-control" wire:model="description">
                                    @error("description")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="icon" class="col-3">Category Icon</label>
                                    <input type="text" id="icon" class="form-control" wire:model="icon">
                                    @error("icon")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="order" class="col-3">Category Order</label>
                                    <input type="text" id="order" class="form-control" wire:model="order">
                                    @error("order")
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

            <div wire:ignore.self class="modal fade" id="edit-modal">
                <div class="modal-dialog">
                    <form wire:submit.prevent="editData">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title" class="col-3">Category Title</label>
                                    <input type="text" id="title" class="form-control" wire:model="title">
                                    @error("title")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-3">Category Description</label>
                                    <input type="text" id="description" class="form-control" wire:model="description">
                                    @error("description")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="icon" class="col-3">Category Icon</label>
                                    <input type="text" id="icon" class="form-control" wire:model="icon">
                                    @error("icon")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="order" class="col-3">Category Order</label>
                                    <input type="text" id="order" class="form-control" wire:model="order">
                                    @error("order")
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
                                <h6>Are you sure you want to delete this category?</h6>
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
                        <th>Description</th>
                        <th>Icon</th>
                        <th>Order</th>
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
                                <th>{{ $unit->description }}</th>
                                <th>{{ $unit->icon }}</th>
                                <th>{{ $unit->order }}</th>
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
                            <td colspan="8" style="text-align: center;"><small>No Category Found</small></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
