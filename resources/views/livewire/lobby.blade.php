<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Players in current lobby</h3>
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
                    <tr>
                        <th>1</th>
                        <th>7847848974784</th>
                        <th>Ninjonik</th>
                        <th>
                            <div id="editModeContainer_7847848974784">
                                <div id="edit_7847848974784" style="display: none">
                                    <input id="input_7847848974784" name="country_7847848974784" type="text" onblur="updateCountry(this.value, '7847848974784')">
                                </div>
                                <span id="country_7847848974784">Soviet Union</span>
                            </div>
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" onclick="editMode('7847848974784')">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                        </th>
                        <th>100%</th>
                        <th>25.6.2023 15:47</th>
                        <th>
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                            <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </th>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
@section('js')
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

    @vite("resources/js/lobby.js")
@stop






