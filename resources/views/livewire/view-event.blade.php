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

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Players in the {{ $event_data->title }} event</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap" id="data">
                <thead>
                <tr>
                    <th>Player</th>
                    <th>Country</th>
                    <th>Rating</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($event_data->player_records)
                    @foreach($event_data->player_records as $player)
                        <tr>
                            <th>{{ $player->player->discord_name }}</th>
                            <th>{{ $player->country }}</th>
                            <th>{{ $player->rating * 100 }}%</th>
                            <th>{{ $player->created_at }}</th>
                            <th>{{ $player->updated_at }}</th>
                            <th>
                                <a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
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
</div>

