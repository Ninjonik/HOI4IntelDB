<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Players</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" wire:model.debounce.500ms="search" class="form-control float-right"
                               placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                        <button type="button" class="btn btn-primary" id="add" hidden>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Player Records Modal -->
            <div class="modal" id="playerRecordsModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Player Records</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="hideModal();">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Rating</th>
                                    <th>Country</th>
                                    <th>Host</th>
                                    <th>Server</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($playerRecords as $record)
                                    <tr>
                                        <td>{{ $record->id }}</td>
                                        <td>{{ $record->rating * 100 }} %</td>
                                        <td>{{ $record->country ? : '-' }}</td>
                                        <td>{{ $record->host->discord_name }}</td>
                                        <td>{{ $record->guild->guild_name }}</td>
                                        <td>{{ $record->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="hideModal();">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <div wire:ignore.self class="modal fade" id="ban-modal">
                <div class="modal-dialog">
                    <form wire:submit.prevent="banData">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Ban/Unban Confirmation</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                        wire:click="cancel()">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h6>Are you sure you want to ban/unban this player?</h6>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" wire:click="cancel()"
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-danger">Yes, I do.</button>
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
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="hideModal();"
                                        wire:click="cancel()">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h6>Are you sure you want to delete this article?</h6>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" wire:click="cancel()" data-dismiss="modal"
                                        onclick="hideModal();">Close
                                </button>
                                <button type="submit" class="btn btn-danger">Yes, delete.</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div wire:ignore.self class="modal fade" id="banInfoModal" tabindex="-1" role="dialog"
                 aria-labelledby="banInfoModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="banInfoModalLabel">Ban Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="hideModal();">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="banHost"></p>
                            <p id="banDate"></p>
                            <p id="banReason"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="hideModal();">Close
                            </button>
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
                        <th>Status</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($data->count() > 0)
                        @foreach ($data as $unit)
                            <tr>
                                <td>{{ $unit->id }}</td>
                                <td>{{ $unit->discord_id }}</td>
                                <td>{{ $unit->discord_name }}</td>
                                <td>{{ $unit->rating * 100 }}%</td>
                                <td>
                                    @if($unit->profile_link)
                                        <a href="{{ $unit->profile_link }}" target="_blank">{{ $unit->profile_link }}</a>
                                    @else
                                        None
                                    @endif
                                </td>
                                <td>
                                    @if ($unit->ban)
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#banInfoModal"
                                                data-ban-host="{{ getNameFunction($unit->banHost) }}"
                                                data-ban-date="{{ $unit->banCreatedAt }}" data-ban-reason="{{ $unit->banReason }}">Banned
                                        </button>
                                    @else
                                        <button class="btn btn-success">Not Banned</button>
                                    @endif
                                </td>
                                <td>{{ $unit->created_at }}</td>
                                <td>{{ $unit->updated_at }}</td>
                                <td>
                                    @if ($unit->ban)
                                        <button class="btn btn-xs btn-default text-success mx-1 shadow" title="UnBan"
                                                wire:click="banConfirmation('{{ $unit->discord_id }}')">
                                            <i class="fa fa-lg fa-fw fa-sign-in-alt"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-xs btn-default text-warning mx-1 shadow" title="Ban"
                                                wire:click="banConfirmation('{{ $unit->discord_id }}')">
                                            <i class="fa fa-lg fa-fw fa-ban"></i>
                                        </button>
                                    @endif
                                    <button class="btn btn-xs btn-default text-success mx-1 shadow" title="View"
                                            wire:click="viewRecords('{{ $unit->discord_id }}')">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </button>
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"
                                            wire:click="deleteConfirmation({{ $unit->id }})">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>
                                </td>
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
