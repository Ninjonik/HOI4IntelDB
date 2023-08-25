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
            <h1><b>403</b></h1>
            <h2>Access Denied.</h2>
            <h4 id="redirect-message" class="redirect-message">Redirecting back home in <span id="countdown">10</span> seconds...</h4>
        </div>
        <!-- /ANIMATION CONTAINER -->

        <!-- ANIMATION CONTAINER -->
        <div class="animation-container animation-fade-left" data-animation-delay="600">
            <p class="subline">You do not have permissions to access this page. Please contact HOI4Intel's admin to assign you appropriate role.</p>
            <a href="{{ env("DISCORD_INVITE_URL") }}" class="steambutton" target="_blank">
                <span>Join Discord</span>
                <div class="icon">
                    <img src="https://assets-global.website-files.com/6257adef93867e50d84d30e2/636e0a6cc3c481a15a141738_icon_clyde_white_RGB.png" alt="Icon" style="width: 30px; height: 24px; vertical-align: middle;">
                </div>
            </a>
        </div>
        <!-- /ANIMATION CONTAINER -->

    </div>
    <!-- /CONTAINER MID -->

    <script>
        // Countdown timer
        var countdownElement = document.getElementById('countdown');
        var seconds = 10;
        var timer = setInterval(function() {
            seconds--;
            countdownElement.textContent = seconds;
            if (seconds <= 0) {
                clearInterval(timer);
                window.location.href = "/";
            }
        }, 1000);
    </script>

    <style>
        .redirect-message {
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
@endsection
