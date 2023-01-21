<!doctype html>

<html lang="en">


<head>

    <!-- META -->
    <meta charset="utf-8">
    <meta name="robots" content="noodp">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- PAGE TITLE -->
    <title>HOI4Intel - Steam Verification</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{ url('/steam/img/favicon.png') }}">

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700&amp;subset=latin-ext" rel="stylesheet">

    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="{{ url('/steam/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ url('/steam/css/main.css') }}">


</head>


<body>


<!-- PRELOADER -->
<div class="preloader">

    <!-- SPINNER -->
    <div class="spinner">

        <div class="bounce-1"></div>
        <div class="bounce-2"></div>
        <div class="bounce-3"></div>

    </div>
    <!-- /SPINNER -->

</div>
<!-- /PRELOADER -->


<!-- HERO -->
<div class="hero">


    <!-- FRONT CONTENT -->
    <div class="front-content">


        <!-- CONTAINER MID -->
        <div class="container-mid">


            <!-- ANIMATION CONTAINER -->
            <div class="animation-container animation-fade-down" data-animation-delay="0">

                <img class="img-responsive logo" src="{{ url('/steam/img/logo.png') }}" alt="image">

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


        <!-- FOOTER -->
        <div class="footer">


            <!-- ANIMATION CONTAINER -->
            <div class="animation-container animation-fade-up" data-animation-delay="1200">

                <p>© 2023 HOI4 Intel | Design by <a href="https://templatefoundation.com">Template Foundation</a> |
                    Support on <a href="https://discord.gg/world-war-community-820918304176340992">WWC Discord</a></p>

            </div>
            <!-- /ANIMATION CONTAINER -->


        </div>
        <!-- /FOOTER -->


    </div>
    <!-- /FRONT CONTENT -->


    <!-- BACKGROUND CONTENT -->
    <div class="background-content parallax-on">

        <div class="background-overlay"></div>
        <div class="background-img layer" data-depth="0.05"></div>

    </div>
    <!-- /BACKGROUND CONTENT -->


</div>
<!-- /HERO -->


<!-- JAVASCRIPTS -->
<script src="{{ url('/steam/js/plugins.js') }}"></script>
<script src="{{ url('/steam/js/main.js') }}"></script>

</body>


</html>
