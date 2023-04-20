@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $difference }}</h3>
                        <p>New Members [Last 7 days]</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $data_stats["player_count"] }}</h3>
                        <p>Member Count</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $data_stats["guild_count"] }}</h3>
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
                        <h3>{{ $data_stats["event_count"] }}</h3>
                        <p>Events</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>

        </div>
        <style>
            .grid-container {
                display: grid;
                grid-template-columns: 7fr 5fr;
                grid-gap: 20px;
            }

        </style>
        <div class="row">
            <section class="col connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i> Stats
                        </h3>
                    </div>
                    <script>

                        const users = {{ Js::from($data) }};

                        const labels = {{ Js::from($labels) }};

                        const data = {
                            labels: labels,
                            datasets: [{
                                label: 'Members in servers with HOI4Bot [Last 7 Days]',
                                backgroundColor: 'rgb(255, 99, 132)',
                                borderColor: 'rgb(255, 99, 132)',
                                data: users,
                            }]
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
            <section class="col connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-bullhorn"></i>
                            HOI4 News
                        </h3>
                    </div>
                    <style>
                        img {
                            max-width: 100%;
                            height: auto;
                        }

                    </style>
                    @foreach($news as $new)
                        <div class="card-body">
                            <div class="callout callout-info">
                                <h5>{{ $new["title"] }} | {{ Carbon\Carbon::createFromTimestamp($new["date"])->toDateTimeString() }}</h5>
                                    <?php
                                    $contentWithImages = str_replace("{STEAM_CLAN_IMAGE}", "https://steamcdn-a.akamaihd.net/steamcommunity/public/images/clans/", $new["contents"]);
                                    $contentWithImagesHTML = preg_replace('/(https?:\/\/[\S]+\.(png|jpg|jpeg|gif))/i', '<img src="$1" style="max-width: 100%; height: auto;">', $contentWithImages);
                                    ?>
                                <p>{!! $contentWithImagesHTML !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>

    </div>

    </div>
    </section>

@stop

@section('js')
    @vite('resources/js/member_chart.js')
    @vite('resources/js/app.js')
@stop
