<div class="container-fluid">

    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>a</h3>
                    <p>New Members [Last 7 days] (Server)</p>
                </div>
                <div class="icon">
                    <i class="fa fa-paperclip" aria-hidden="true"></i>
                </div>
            </div>
        </div>


            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>b</h3>
                        <p>Player Count</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>c</h3>
                        <p>Guild Count</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>d</h3>
                        <p>Events</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>

    </div>

    <div class="row">
        <section class="col connectedSortable">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i> Stats
                    </h3>
                </div>
                <script>
                    const labels = {{ Js::from($labels) }};
                    const datasets = {{ Js::from($datasets) }};
                    const data = {
                        labels: labels,
                        datasets: datasets
                    };
                </script>
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="chart tab-pane active" id="revenue-chart" style="display: inline-block; position: relative; width: 100%;">
                            <canvas id="memberchart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Events</h3>
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
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap" id="data">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Guild</th>
                    <th>Host</th>
                    <th>Text Channel</th>
                    <th>VC Channel</th>
                    <th>Steam Req</th>
                    <th>Rating Req</th>
                    <th>Global DB</th>
                    <th>Countries</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($events_data->count() > 0)
                    @foreach($events_data as $unit)
                        <tr>
                            <th>{{ $unit->id }}</th>
                            <th>{{ $unit->title }}</th>
                            <th>
                                @switch($unit->started)
                                    @case(0)
                                        Scheduled
                                        @break
                                    @case(1)
                                        Started -
                                        <a href="{{ route('dashboard.lobby', ['id' => $unit->guild_id, 'lobby_id' => $unit->voice_channel_id]) }}">Lobby</a>
                                        @break
                                    @case(2)
                                        Ended
                                        @break
                                @endswitch
                            </th>
                            <th>{{ $unit->description }}</th>
                            <th>{{ $unit->guild_id }}</th>
                            <th>{{ $unit->user->name }}</th>
                            <th>{{ $unit->channel_id }}</th>
                            <th>{{ $unit->voice_channel_id }}</th>
                            <th>{{ $unit->steam_required }}</th>
                            <th>{{ $unit->rating_required * 100 }}%</th>
                            <th>{{ $unit->global_database }}</th>
                            <th>{{ $unit->countries }}</th>
                            <th>{{ $unit->created_at }}</th>
                            <th>{{ $unit->updated_at }}</th>
                            <th>
                                <a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" href="{{ route('dashboard.guild.view-event', ['id' => $unit->guild_id, 'event_id' => $unit->id]) }}">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                            </th>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" style="text-align: center;"><small>No Events Found</small></td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $events_data->links() }}
        </div>
    </div>
</div>

