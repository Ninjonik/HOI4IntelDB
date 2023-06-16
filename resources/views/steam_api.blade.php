@extends('layouts.status')
@section('content')
<!-- CONTAINER MID -->
<div class="container-mid">


    <!-- ANIMATION CONTAINER -->
    <div class="animation-container animation-fade-down" data-animation-delay="0">

        <img class="img-responsive logo" src="{{ url('/themes/steam/img/logo.png') }}" alt="image">

    </div>
    <!-- /ANIMATION CONTAINER -->


    <!-- ANIMATION CONTAINER -->
    <div class="animation-container animation-fade-right" data-animation-delay="300">

        <h1>{{ $data["status"] }}</h1>

    </div>
    <!-- /ANIMATION CONTAINER -->


    <!-- ANIMATION CONTAINER -->
    <div class="animation-container animation-fade-left" data-animation-delay="600">

        <p class="subline">{{ $data["description"] }}</p>

    </div>
    <!-- /ANIMATION CONTAINER -->


</div>
<!-- /CONTAINER MID -->
@endsection
