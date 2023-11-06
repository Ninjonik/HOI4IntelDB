<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Players in <b>{{ $event['title'] }}</b> Lobby</h3>
                <div class="card-tools">
                    <button wire:click="fetchLobbyData" class="btn btn-success" id="fetchData">
                        Refresh
                    </button>
                    <button wire:click="saveLobbyData" class="btn btn-primary mr-2" id="saveData">
                        Save
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="data">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Discord ID</th>
                        <th>Name</th>
                        <th>Country (nickname)</th>
                        <th>Rating</th>
                        <th>Joined</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($lobbyData as $player)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $player['user']['discord_id'] }}</td>
                            <td>{{ $player['user']['discord_name'] }}</td>
                            <th>
                                <div id="editModeContainer_{{ $player['user']['discord_id'] }}">
                                    <div id="edit_{{ $player['user']['discord_id'] }}" style="display: none">
                                        <input id="input_{{ $player['user']['discord_id'] }}" name="country_{{ $player['user']['discord_id'] }}" type="text" onblur="updateCountry(this.value, '{{ $player['user']['discord_id'] }}')">
                                    </div>
                                    <span id="country_{{ $player['user']['discord_id'] }}">{{ $player['user']['country'] }}</span>
                                </div>
                                <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" onclick="editMode('{{ $player['user']['discord_id'] }}')">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </button>
                            </th>
                            <td>{{ $player['user']['rating'] * 100 }}%</td>
                            <td>{{ date('d.m.Y H:i:s', strtotime(date('Y-m-d H:i:s', $player['user']['joined']))) }}</td>
                            <th>
                                <a href="{{ env('HOI4DB_URL') }}/profile/{{ $player['user']['discord_id'] }}" target="_blank">
                                    <button class="btn btn-xs btn-default text-success mx-1 shadow" title="View">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </button>
                                </a>
                                <a wire:click="playerLeft('{{ $player['user']['discord_id'] }}')">
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Remove">
                                        <i class="fa fa-lg fa-fw fa-times"></i>
                                    </button>
                                </a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Reservations in <b>{{ $event['title'] }}</b> Lobby</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="data">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Discord ID</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Rating</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($event->reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id + 1 }}</td>
                            <td>{{ $reservation->player_id }}</td>
                            <td>{{ $reservation->user->discord_name }}</td>
                            <td>{{ $reservation->country }}</td>
                            <td>{{ $reservation->user->rating * 100 }}%</td>
                            <td>{{ $reservation->created_at }}</td>
                            <th>
                                <a wire:click="deleteReservation('{{ $reservation->id }}')">
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Remove">
                                        <i class="fa fa-lg fa-fw fa-times"></i>
                                    </button>
                                </a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
    <script>
        window.lobbyId = '{{ $lobby_id }}';

        function editMode(id) {
            var editModeText = document.getElementById("edit_" + id);
            var countryText = document.getElementById("country_" + id);

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
            const countrySpan = document.getElementById(`country_${id}`);
            const inputElement = document.getElementById(`input_${id}`);
            const editModeText = document.getElementById(`edit_${id}`);

            // Update the country span text
            countrySpan.textContent = value;

            try {
                // Trigger the Laravel API route
                const response = await fetch('/lobby/edit', {
                    method: 'POST',
                    body: JSON.stringify({
                        "guild_id": '{{ $guild_id }}',
                        "player_id": id,
                        "player_new_name": value
                    }),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });

                // Check if the response was successful
                if (!response.ok) {
                    throw new Error('Request failed with status ' + response.status);
                }

                // Parse the response as JSON
                const data = await response.json();
                // Handle the parsed JSON data
                console.log(data);
            } catch (error) {
                // Handle any errors that occur during the API request
                console.error(error);
            }

            // Hide the input and show the country span
            editModeText.style.display = 'none';
            countrySpan.style.display = 'inline';
        }
    </script>
    @livewireScripts
    @vite("resources/js/lobby.js")
</div>
