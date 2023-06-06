<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Players</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" wire:model.debounce.500ms="search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                        <button type="button" class="btn btn-primary" id="add" hidden>
                        </button>
                    </div>
                </div>
            </div>

            <div wire:ignore.self class="modal fade" id="ban-modal">
                <div class="modal-dialog">
                    <form wire:submit.prevent="banData">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Ban/Unban Confirmation</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h6>Are you sure you want to ban/unban this player?</h6>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" wire:click="cancel()" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" wire:click="banData()">Yes, I do.</button>
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
                        <th>Discord ID</th>
                        <th>Discord Name</th>
                        <th>Rating</th>
                        <th>Steam Profile</th>
                        <th>Status</th>
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
                                <th>{{ $unit->discord_id }}</th>
                                <th>{{ $unit->discord_name}}</th>
                                <th>{{ $unit->rating*100 }}%</th>
                                <th>{{ $unit->profile_link }}</th>
                                <th>
                                    @switch($unit->status)
                                        @case(0)
                                            Normal
                                            @break
                                        @case(1)
                                            Suspended
                                            @break
                                        @case(2)
                                            Banned
                                            @break
                                        @default
                                            -
                                    @endswitch
                                </th>
                                <th>{{ $unit->created_at }}</th>
                                <th>{{ $unit->updated_at }}</th>
                                <th>
                                    <button class="btn btn-xs btn-default text-warning mx-1 shadow" title="Ban" wire:click="banConfirmation({{ $unit->id }})">
                                        <i class="fa fa-lg fa-fw fa-ban"></i>
                                    </button>
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" wire:click="deleteConfirmation({{ $unit->id }})">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>
                                </th>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" style="text-align: center;"><small>No Player Found</small></td>
                        </tr>
                    @endif
                    </tbody>
                </table>

            </div>
            <div class="card-footer clearfix">
                {{ $data->links() }}
            </div>

        </div>

    </div>
</div>







