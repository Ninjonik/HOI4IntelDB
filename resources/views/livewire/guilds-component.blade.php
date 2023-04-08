
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Guilds</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-guild">
                            Add New Guild
                        </button>
                    </div>
                </div>
            </div>

            <div wire:ignore.self class="modal fade" id="modal-guild">
                <div class="modal-dialog">
                    <form wire:submit.prevent="storeGuildData">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create new Guild</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="guild_id" class="col-3">Guild ID</label>
                                   <input type="number" id="guild_id" class="form-control" wire:model="guild_id">
                                    @error("guild_id")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="guild_name" class="col-3">Server Name</label>
                                    <input type="text" id="guild_name" class="form-control" wire:model="guild_name">
                                    @error("guild_name")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="guild_desc" class="col-3">Server Description</label>
                                    <input type="text" id="guild_desc" class="form-control" wire:model="guild_desc">
                                    @error("guild_desc")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div wire:ignore.self class="modal fade" id="edit-modal-guild">
                <div class="modal-dialog">
                    <form wire:submit.prevent="editGuildData">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Guild</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="guild_id" class="col-3">Guild ID</label>
                                    <input type="number" id="guild_id" class="form-control" wire:model="guild_id">
                                    @error("guild_id")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="guild_name" class="col-3">Server Name</label>
                                    <input type="text" id="guild_name" class="form-control" wire:model="guild_name">
                                    @error("guild_name")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="guild_desc" class="col-3">Server Description</label>
                                    <input type="text" id="guild_desc" class="form-control" wire:model="guild_desc">
                                    @error("guild_desc")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div wire:ignore.self class="modal fade" id="delete-modal-guild">
                <div class="modal-dialog">
                    <form wire:submit.prevent="editGuildData">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete Confirmation</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h6>Are you sure you want to delete this guild?</h6>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" wire:click="cancel()" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" wire:click="deleteGuildData()">Yes, delete.</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="guilds">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>guild_id</th>
                        <th>Guild Name</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($guilds->count() > 0)
                        @foreach($guilds as $guild)
                            <tr>
                                <th>{{ $guild->id }}</th>
                                <th>{{ $guild->guild_id }}</th>
                                <th>{{ $guild->guild_name }}</th>
                                <th>{{ $guild->created_at }}</th>
                                <th>{{ $guild->updated_at }}</th>
                                <th>
                                    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" wire:click="editGuild({{ $guild->id }})">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </button>
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" wire:click="deleteConfirmation({{ $guild->id }})">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>
                                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </button>
                                </th>
                            </tr>
                        @endforeach
                    @else
                     <tr>
                         <td colspan="8" style="text-align: center;"><small>No Guild Found</small></td>
                     </tr>
                    @endif
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
