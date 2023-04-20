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
                    </div>
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
                                <th>{{ $unit->discord_id}}</th>
                                <th>{{ $unit->rating*100 }}%</th>
                                <th>{{ $unit->profile_link }}</th>
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







