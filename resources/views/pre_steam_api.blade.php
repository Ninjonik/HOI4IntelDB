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

        <h1>Steam Verification</h1>

    </div>
    <!-- /ANIMATION CONTAINER -->


    <!-- ANIMATION CONTAINER -->
    <div class="animation-container animation-fade-left" data-animation-delay="600">

        <p class="subline">To connect your steam account to your discord account click on the button below:</p>
        <a href="{{ route('auth/steam') }}" class="steambutton"><span>Login With Steam</span><div class="icon">
                <i class="fa fa-steam-square"></i>
        </div></a>

    </div>
    <!-- /ANIMATION CONTAINER -->


</div>
<!-- /CONTAINER MID -->
@endsection
