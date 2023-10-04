<div class="container-fluid">

    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $event_data->player_records->count() }}</h3>
                    <p>Players</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $average_rating }}%</h3>
                    <p>Average Rating</p>
                </div>
                <div class="icon">
                    <i class="fa fa-percent" aria-hidden="true"></i>
                </div>
            </div>
        </div>

    </div>

    <div wire:ignore.self class="modal fade" id="delete-modal">
        <div class="modal-dialog">
            <form wire:submit.prevent="deleteData">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Confirmation</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="cancel()" onclick="hideModal();">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6>Are you sure you want to delete this article?</h6>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" wire:click="cancel()" data-dismiss="modal" id="close" onclick="hideModal();">Close</button>
                        <button type="submit" class="btn btn-danger">Yes, delete.</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Players in the {{ $event_data->title }} event</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap" id="data">
                <thead>
                <tr>
                    <th class="col-md-3">Player</th>
                    <th class="col-md-3">Country</th>
                    <th class="col-md-2">Rating (0-100)</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($event_data->player_records)
                    @foreach($event_data->player_records as $player)
                        <tr>
                            <th class="align-middle">{{ $player->player->discord_name }}</th>
                            <th class="align-middle">{{ $player->country }}</th>
                            <th class="align-middle">
                                <div id="editModeContainer_{{ $player->player_id }}">
                                    <div id="edit_{{ $player->player_id }}" style="display: none">
                                        <input id="input_{{ $player->player_id }}" name="rating_{{ $player->player_id }}" type="number" min="0" max="100" onblur="updateCountry(this.value, '{{ $player->player_id }}')">
                                    </div>
                                    <span id="rating_{{ $player->player_id }}">{{ $player->rating * 100 }} %</span>
                                </div>
                                <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" onclick="editMode('{{ $player->player_id }}')">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </button>
                            </th>
                            <th class="align-middle">{{ $player->created_at }}</th>
                            <th class="align-middle">{{ $player->updated_at }}</th>
                            <th class="text-right align-middle">
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" wire:click="deleteConfirmation({{ $player->id }})">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                            </th>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" style="text-align: center;"><small>No Players Found</small></td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function editMode(id) {
            var editModeText = document.getElementById("edit_" + id);
            var countryText = document.getElementById("rating_" + id);

            var editMode = (countryText.style.display !== "none");

            if (editMode) {
                editModeText.style.display = "block";
                countryText.style.display = "none";
            } else {
                editModeText.style.display = "none";
                countryText.style.display = "block";
            }
        }
    </script>
    <script>
        async function updateCountry(value, id) {
            const countrySpan = document.getElementById(`rating_${id}`);
            const inputElement = document.getElementById(`input_${id}`);
            const editModeText = document.getElementById(`edit_${id}`);

            if(!value){
                editModeText.style.display = 'none';
                countrySpan.style.display = 'inline';
                return 'error';
            }

            // Update the country span text
            countrySpan.textContent = value;

            Livewire.emit('updateRating', [value, id]);

            // Hide the input and show the country span
            editModeText.style.display = 'none';
            countrySpan.style.display = 'inline';
        }
    </script>
    @livewireScripts
</div>

