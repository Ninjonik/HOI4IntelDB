<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>HOI4Intel | Home</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ url('/themes/landing/images/favicon.png') }}" type="image/png">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{ url('/themes/landing/css/slick.css') }}">

    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="{{ url('/themes/landing/css/font-awesome.min.css') }}">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{ url('/themes/landing/css/LineIcons.css') }}">

    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{ url('/themes/landing/css/animate.css') }}">

    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{ url('/themes/landing/css/magnific-popup.css') }}">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{ url('/themes/landing/css/bootstrap.min.css') }}">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{ url('/themes/landing/css/default.css') }}">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{ url('/themes/landing/css/style.css') }}">

    <!-- HTML Meta Tags -->
    <title>HOI4Intel - The Revolutionary HOI4 Discord Bot</title>
    <meta name="description" content="@yield('og_description', 'Your Assistant Partner for HOI4.')">
    <meta name="theme-color" content="#e6331c">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://hoi.theorganization.eu/wiki">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', 'HOI4Intel - The Revolutionary HOI4 Discord Bot')">
    <meta property="og:description" content="@yield('og_description', 'Your Assistant Partner for HOI4.')">
    <meta property="og:image" content="@yield('og_image', 'https://cdn.akamai.steamstatic.com/steam/apps/394360/capsule_616x353.jpg?t=1679479633')">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="hoi.theorganization.eu">
    <meta property="twitter:url" content="https://hoi.theorganization.eu/wiki">
    <meta name="twitter:title" content="@yield('og_title', 'HOI4Intel - The Revolutionary HOI4 Discord Bot')">
    <meta name="twitter:description" content="@yield('og_description', 'Your Assistant Partner for HOI4.')">
    <meta name="twitter:image" content="@yield('og_image', 'https://cdn.akamai.steamstatic.com/steam/apps/394360/capsule_616x353.jpg?t=1679479633')">
</head>

</head>

<body>
<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->


<!--====== PRELOADER PART START ======-->

<div class="preloader">
    <div class="loader">
        <div class="ytp-spinner">
            <div class="ytp-spinner-container">
                <div class="ytp-spinner-rotator">
                    <div class="ytp-spinner-left">
                        <div class="ytp-spinner-circle"></div>
                    </div>
                    <div class="ytp-spinner-right">
                        <div class="ytp-spinner-circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--====== PRELOADER PART ENDS ======-->

<!--====== HEADER PART START ======-->

<header class="header-area">
    <div class="navbar-area headroom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{ url('/themes/landing/images/logo.png') }}" alt="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav m-auto">
                                <li class="nav-item active">
                                    <a href="#home"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#about"><i class="fa fa-users" aria-hidden="true"></i> About</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#services"><i class="fa fa-list" aria-hidden="true"></i> Features</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#video"><i class="fa fa-video-camera" aria-hidden="true"></i> How to</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('wiki') }}"><i class="fa fa-book" aria-hidden="true"></i> Wiki</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('status') }}"><i class="fa fa-server" aria-hidden="true"></i> Status</a>
                                </li>
                                @auth
                                <li class="nav-item">
                                    <a href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a>
                                </li>
                                @endauth
                                @guest
                                <li class="nav-item">
                                    <a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign in</a>
                                </li>
                                @endguest
                                @can('view-dashboard')
                                <li class="nav-item">
                                    <a href="{{ route('dashboard') }}"><i class="fa fa-wrench"></i> Panel</a>
                                </li>
                                @endcan
                            </ul>
                        </div> <!-- navbar collapse -->
                        <a class="main-btn" href="https://discord.com/api/oauth2/authorize?client_id=1063766598197981215&permissions=2197412118359&scope=bot%20applications.commands" target="_blank">
                            <div class="navbar-btn d-none d-sm-inline-block">
                                Invite
                            </div>
                        </a>
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- navbar area -->

    <div id="home" class="header-hero bg_cover d-lg-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="header-hero-content">
                        <h1 class="hero-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"><b>Your</b> <span>Assistant</span> Partner for <b>HOI4.</b></h1>
                        <p class="text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">The Ultimate Discord Bot Made By And For The HOI4 Community.</p>
                    </div> <!-- header hero content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="header-hero-image d-flex align-items-center wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="1.1s">
            <div class="image">
                <img src="{{ url('/themes/landing/images/hoi4logo.jpg') }}" alt="HOI4 Image">
            </div>
        </div> <!-- header hero image -->
    </div> <!-- header hero -->
</header>

<!--====== HEADER PART ENDS ======-->

<!--====== ABOUT PART START ======-->

<section id="about" class="about-area pt-115">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="about-title text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h6 class="welcome">WELCOME</h6>
                    <h3 class="title">We work hard on making <span>your HOI4 experience flawless.</span></h3>
                </div>
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="about-image mt-60 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <img src="{{ url('/themes/landing/images/lobbysim.png') }}" alt="about">
                </div> <!-- about image -->
            </div>
        </div> <!-- row -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="about-content pt-45">
                    <p class="text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">We are in close contact with many Discord Server Owners to ensure that important features of the bot are maintained well and requested ones are added.</p>

                    <div class="about-counter pt-60">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="single-counter counter-color-1 mt-30 d-flex wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                                    <div class="counter-shape">
                                        <span class="shape-1"></span>
                                        <span class="shape-2"></span>
                                    </div>
                                    <div class="counter-content media-body">
                                        <span class="counter-count"><span class="counter">{{ $data["guild_count"] }}</span></span>
                                        <p class="text">Guilds using HOI4Intel</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                            <div class="col-sm-4">
                                <div class="single-counter counter-color-2 mt-30 d-flex wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                                    <div class="counter-shape">
                                        <span class="shape-1"></span>
                                        <span class="shape-2"></span>
                                    </div>
                                    <div class="counter-content media-body">
                                        <span class="counter-count counter">{{ $data["player_count"] }}</span>
                                        <p class="text">Players Registered</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                            <div class="col-sm-4">
                                <div class="single-counter counter-color-3 mt-30 d-flex wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
                                    <div class="counter-shape">
                                        <span class="shape-1"></span>
                                        <span class="shape-2"></span>
                                    </div>
                                    <div class="counter-content media-body">
                                        <span class="counter-count"><span class="counter">{{ $data["event_count"] }}</span></span>
                                        <p class="text">Events created</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- about counter -->
                </div> <!-- about content -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== ABOUT PART ENDS ======-->

<!--====== OUR SERVICE PART START ======-->

<section id="services" class="our-services-area pt-115">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-9">
                <div class="section-title text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                    <h6 class="sub-title">HOI4Intel Features</h6>
                    <h4 class="title">Bunch of Services <span>to Rock Your HOI4 Session</span></h4>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="our-services-tab pt-30">
                    <ul class="nav justify-content-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="active" id="business-tab" data-toggle="tab" href="#business" role="tab" aria-controls="business" aria-selected="true">
                                <i class="lni lni-thumbs-up"></i><span>Rating <br> System</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="digital-tab" data-toggle="tab" href="#digital" role="tab" aria-controls="digital" aria-selected="false">
                                <i class="lni lni-ticket"></i> <span>Steam <br> Verification</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a id="market-tab" data-toggle="tab" href="#market" role="tab" aria-controls="market" aria-selected="false">
                                <i class="lni lni-game"></i> <span>Event <br> System</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="business" role="tabpanel" aria-labelledby="business-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="our-services-image mt-50">
                                        <img src="{{ url('/themes/landing/images/stonks.jpg') }}" alt="service">
                                    </div> <!-- our services image -->
                                </div>
                                <div class="col-lg-6">
                                    <div class="our-services-content mt-45">
                                        <h3 class="services-title">Rating System <span>for Ideal Lobbies.</span></h3>
                                        <p class="text">Rating system was created to ensure requirements set by individual hosts. Filtering non-qualified people from playing majors by setting their rating to some level or straight up setting exploiter's rating to 0. Steam Verification can add another layer of protection against multi-accounting with 1 steam account per 1 discord account.</p>
                                    </div> <!-- our services content -->
                                </div>
                            </div> <!-- row -->
                        </div>

                        <div class="tab-pane fade" id="digital" role="tabpanel" aria-labelledby="digital-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="our-services-image mt-50">
                                        <img src="{{ url('/themes/landing/images/steam.png') }}" alt="service">
                                    </div> <!-- our services image -->
                                </div>
                                <div class="col-lg-6">
                                    <div class="our-services-content mt-45">
                                        <h3 class="services-title">Steam Verification <span>for extra Security Layer.</span></h3>
                                        <p class="text">Dealing with multi-accounters that have already been banned or suspended on your server has never been easier with Steam Verification! Steam Verification ensures that 1 steam account can only be connected to 1 discord account at a time therefore making it harder for multi-accounters to bypass your punishments. </p>
                                    </div> <!-- our services content -->
                                </div>
                            </div> <!-- row -->
                        </div>

                        <div class="tab-pane fade" id="market" role="tabpanel" aria-labelledby="market-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="our-services-image mt-50">
                                        <img src="{{ url('/themes/landing/images/eventsystem.png') }}" alt="service">
                                    </div> <!-- our services image -->
                                </div>
                                <div class="col-lg-6">
                                    <div class="our-services-content mt-45">
                                        <h3 class="services-title">Event System  <span>for your upcoming Games.</span></h3>
                                        <p class="text">From announcing a upcoming game to handling reservations. It can be frustrating to plan HOI4 Game. That is why we have added the Event System / Organizer that allows you to easily plan a HOI4 Game in a future, set requirements for people reservating and if not blocked then reminding them of the game in time.</p>
                                    </div> <!-- our services content -->
                                </div>
                            </div> <!-- row -->
                        </div>
                    </div> <!-- tab content -->
                </div> <!-- our services tab -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== OUR SERVICE PART ENDS ======-->

<!--====== ABOUT PART START ======-->

<section id="video" class="about-area pt-115">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="about-title text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h6 class="welcome">HOW TO</h6>
                    <h3 class="title">Video guide explaining HOI4Intel's <span>Installation & Basic Usage</span></h3>
                </div>
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-12" style="height: 70vh;">
                <div class="about-image mt-60 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s" style="display: flex; width: 100%; height: 100%; flex-direction: column; background-color: blue; overflow: hidden;">
                    <iframe style="flex-grow: 1;"
                            src="https://www.youtube.com/embed/n4ltNFrooqU">
                    </iframe>
                </div> <!-- about image -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== ABOUT PART ENDS ======-->

<!--====== SERVICE PART START ======-->

<section id="service" class="service-area pt-105">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8">
                <div class="section-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                    <h6 class="sub-title">Why HOI4Intel</h6>
                    <h4 class="title">The reasons to choose HOI4Intel <span>as your HOI4 partner</span></h4>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="service-wrapper mt-60 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
            <div class="row no-gutters justify-content-center">
                <div class="col-lg-4 col-md-7">
                    <div class="single-service d-flex">
                        <div class="service-icon">
                            <img src="{{ url('/themes/landing/images/service-1.png') }}" alt="Icon">
                        </div>
                        <div class="service-content media-body">
                            <h4 class="service-title">Highly Innovative</h4>
                            <p class="text">We continue to add new features frequently and carefully listen to your suggestions.</p>
                        </div>
                        <div class="shape shape-1">
                            <img src="{{ url('/themes/landing/images/shape/shape-1.svg') }}" alt="shape">
                        </div>
                        <div class="shape shape-2">
                            <img src="{{ url('/themes/landing/images/shape/shape-2.svg') }}" alt="shape">
                        </div>
                    </div> <!-- single service -->
                </div>
                <div class="col-lg-4 col-md-7">
                    <div class="single-service service-border d-flex">
                        <div class="service-icon">
                            <img src="{{ url('/themes/landing/images/service-2.png') }}" alt="Icon">
                        </div>
                        <div class="service-content media-body">
                            <h4 class="service-title">Bunch of Features</h4>
                            <p class="text">Bot has many components that enhance your both HOI4 Hosting & Player's Experiences.</p>
                        </div>
                        <div class="shape shape-3">
                            <img src="{{ url('/themes/landing/images/shape/shape-3.svg') }}" alt="shape">
                        </div>
                    </div> <!-- single service -->
                </div>
                <div class="col-lg-4 col-md-7">
                    <div class="single-service d-flex">
                        <div class="service-icon">
                            <img src="{{ url('/themes/landing/images/service-3.png') }}" alt="Icon">
                        </div>
                        <div class="service-content media-body">
                            <h4 class="service-title">Quality Support</h4>
                            <p class="text">You can contact us anytime at the official support server! <a href="{{ env("DISCORD_INVITE_URL") }}">Join here!</a></p>
                        </div>
                        <div class="shape shape-4">
                            <img src="{{ url('/themes/landing/images/shape/shape-4.svg') }}" alt="shape">
                        </div>
                        <div class="shape shape-5">
                            <img src="{{ url('/themes/landing/images/shape/shape-5.svg') }}" alt="shape">
                        </div>
                    </div> <!-- single service -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="service-btn text-center pt-25 pb-15">
                        <a class="main-btn main-btn-2" href="#services">All Features</a>
                    </div> <!-- service btn -->
                </div>
            </div> <!-- row -->
        </div> <!-- service wrapper -->
    </div> <!-- container -->
</section>

<!--====== SERVICE PART ENDS ======-->

<!--====== TESTIMONIAL PART START ======-->
<!--
<section id="testimonial" class="testimonial-area pt-70 pb-120">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-5 col-lg-6">
                <div class="testimonial-left-content mt-45 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title">
                        <h6 class="sub-title">Testimonials</h6>
                        <h4 class="title">The Customer Is Always Right</h4>
                    </div>
                    <ul class="testimonial-line">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <p class="text">The Testimonials section is where you can read reviews from satisfied customers who have used our HOI4 Discord bot. Our customers' opinions matter to us, and we value their feedback. From the Event System to the Rating System and Steam Verification feature, our customers have shared their experiences with using the bot and how it has made their HOI4 gaming experience better. Read on to see what our customers have to say and decide for yourself if our bot is right for you.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="testimonial-right-content mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                    <div class="quota">
                        <i class="lni-quotation"></i>
                    </div>
                    <div class="testimonial-content-wrapper testimonial-active">

                        <div class="single-testimonial">
                            <div class="testimonial-text">
                                <p class="text">“This bot is a game-changer! The event system makes hosting and joining games a breeze.”</p>
                            </div>
                            <div class="testimonial-author d-sm-flex justify-content-between">
                                <div class="author-info d-flex align-items-center">
                                    <div class="author-image">
                                        <img src="" alt="author">
                                    </div>
                                    <div class="author-name media-body">
                                        <h5 class="name">John Doe</h5>
                                    </div>
                                </div>
                                <div class="author-review">
                                    <ul class="star">
                                        <li><i class="lni-star"></i></li>
                                        <li><i class="lni-star"></i></li>
                                        <li><i class="lni-star"></i></li>
                                        <li><i class="lni-star"></i></li>
                                        <li><i class="lni-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="single-testimonial">
                            <div class="testimonial-text">
                                <p class="text">“The rating system is really helpful for identifying players with similar skill levels. The Steam Verification feature is a nice touch.”</p>
                            </div>
                            <div class="testimonial-author d-sm-flex justify-content-between">
                                <div class="author-info d-flex align-items-center">
                                    <div class="author-image">
                                        <img src="" alt="author">
                                    </div>
                                    <div class="author-name media-body">
                                        <h5 class="name">Jane Smith</h5>
                                    </div>
                                </div>
                                <div class="author-review">
                                    <ul class="star">
                                        <li><i class="lni-star"></i></li>
                                        <li><i class="lni-star"></i></li>
                                        <li><i class="lni-star"></i></li>
                                        <li><i class="lni-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="single-testimonial">
                            <div class="testimonial-text">
                                <p class="text">“The bot is okay, but it could use some improvements. It's a bit clunky to use at times.”</p>
                            </div>
                            <div class="testimonial-author d-sm-flex justify-content-between">
                                <div class="author-info d-flex align-items-center">
                                    <div class="author-image">
                                        <img src="" alt="author">
                                    </div>
                                    <div class="author-name media-body">
                                        <h5 class="name">Bob Johnson</h5>
                                    </div>
                                </div>
                                <div class="author-review">
                                    <ul class="star">
                                        <li><i class="lni-star"></i></li>
                                        <li><i class="lni-star"></i></li>
                                        <li><i class="lni-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="single-testimonial">
                            <div class="testimonial-text">
                                <p class="text">“This is the best HOI4 bot out there! The Steam Verification feature is a great way to prevent cheaters from ruining the game.”</p>
                            </div>
                            <div class="testimonial-author d-sm-flex justify-content-between">
                                <div class="author-info d-flex align-items-center">
                                    <div class="author-image">
                                        <img src="" alt="author">
                                    </div>
                                    <div class="author-name media-body">
                                        <h5 class="name">David Brown</h5>
                                    </div>
                                </div>
                                <div class="author-review">
                                    <ul class="star">
                                        <li><i class="lni-star"></i></li>
                                        <li><i class="lni-star"></i></li>
                                        <li><i class="lni-star"></i></li>
                                        <li><i class="lni-star"></i></li>
                                        <li><i class="lni-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="single-testimonial">
                            <div class="testimonial-text">
                                <p class="text">“The event system is really helpful for scheduling games with friends. The bot has definitely made my HOI4 gaming experience more enjoyable.”</p>
                            </div>
                            <div class="testimonial-author d-sm-flex justify-content-between">
                                <div class="author-info d-flex align-items-center">
                                    <div class="author-image">
                                        <img src="" alt="author">
                                    </div>
                                    <div class="author-name media-body">
                                        <h5 class="name">Sarah Thompson</h5>
                                    </div>
                                </div>
                                <div class="author-review">
                                    <ul class="star">
                                        <li><i class="lni-star"></i></li>
                                        <li><i class="lni-star"></i></li>
                                        <li><i class="lni-star"></i></li>
                                        <li><i class="lni-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->

<!--====== TESTIMONIAL PART ENDS ======-->

<!--====== BLOG PART START ======-->
<!--
<section id="blog" class="blog-area pt-115">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="section-title text-center pb-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h6 class="sub-title">Our Blog</h6>
                    <h4 class="title">Letest <span>News.</span></h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="single-blog mt-30 wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.4s">
                    <div class="blog-image">
                        <a href="blog-details.html"><img src="{{ url('/themes/landing/images/news-1.jpg') }}" alt="news"></a>
                    </div>
                    <div class="blog-content">
                        <h4 class="blog-title"><a href="blog-details.html">Nulla eget urna at tortor  turpi feugiat tristique in sit.</a></h4>
                        <div class="blog-author d-flex align-items-center">
                            <div class="author-image">
                                <img src="{{ url('/themes/landing/images/author-1.jpg') }}" alt="author">
                            </div>
                            <div class="author-content media-body">
                                <h6 class="sub-title">Posted by</h6>
                                <p class="text">Isabela Moreira</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="single-blog mt-30 wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.7s">
                    <div class="blog-image">
                        <a href="blog-details.html"><img src="{{ url('/themes/landing/images/news-2.jpg') }}" alt="news"></a>
                    </div>
                    <div class="blog-content">
                        <h4 class="blog-title"><a href="blog-details.html">Nulla eget urna at tortor  turpi feugiat tristique in sit.</a></h4>
                        <div class="blog-author d-flex align-items-center">
                            <div class="author-image">
                                <img src="{{ url('/themes/landing/images/author-2.jpg') }}" alt="author">
                            </div>
                            <div class="author-content media-body">
                                <h6 class="sub-title">Posted by</h6>
                                <p class="text">Elon Musk</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="single-blog mt-30 wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="1s">
                    <div class="blog-image">
                        <a href="blog-details.html"><img src="{{ url('/themes/landing/images/news-3.jpg') }}" alt="news"></a>
                    </div>
                    <div class="blog-content">
                        <h4 class="blog-title"><a href="blog-details.html">Nulla eget urna at tortor  turpi feugiat tristique in sit.</a></h4>
                        <div class="blog-author d-flex align-items-center">
                            <div class="author-image">
                                <img src="{{ url('/themes/landing/images/author-3.jpg') }}" alt="author">
                            </div>
                            <div class="author-content media-body">
                                <h6 class="sub-title">Posted by</h6>
                                <p class="text">Fiona</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->
<!--====== BLOG PART ENDS ======-->

<!--====== FOOTER PART START ======-->

<footer id="footer" class="footer-area bg_cover">
    <div class="container">
        <div class="footer-copyright text-center">
            <p class="text">
                <a href="https://hoi.theorganization.eu/wiki/article/22/terms-of-service" target="_blank" rel="noopener noreferrer">Terms of Service</a> -
                <a href="https://hoi.theorganization.eu/wiki/article/23/privacy-policy" target="_blank" rel="noopener noreferrer">Privacy Policy</a>
            </p>
            <p>
                <a href="{{ route('data-request') }}" target="_blank" rel="noopener noreferrer">Data Request</a>
            </p>
            <p class="text">© 2023 TheOrganization.eu, Template by <a href="https://uideck.com" rel="nofollow">UIdeck</a>, All Rights Reserved. HOI4Intel is not associated with Paradox Interactive.</p>
        </div>
    </div> <!-- container -->
</footer>

<!--====== FOOTER PART ENDS ======-->

<!--====== BACK TOP TOP PART START ======-->

<a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

<!--====== BACK TOP TOP PART ENDS ======-->




<!--====== Jquery js ======-->
<script src="{{ url('/themes/landing/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ url('/themes/landing/js/vendor/modernizr-3.7.1.min.js') }}"></script>

<!--====== Bootstrap js ======-->
<script src="{{ url('/themes/landing/js/popper.min.js') }}"></script>
<script src="{{ url('/themes/landing/js/bootstrap.min.js') }}"></script>

<!--====== Slick js ======-->
<script src="{{ url('/themes/landing/js/slick.min.js') }}"></script>

<!--====== Isotope js ======-->
<script src="{{ url('/themes/landing/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ url('/themes/landing/js/isotope.pkgd.min.js') }}"></script>

<!--====== Counter Up js ======-->
<script src="{{ url('/themes/landing/js/waypoints.min.js') }}"></script>
<script src="{{ url('/themes/landing/js/jquery.counterup.min.js') }}"></script>

<!--====== Circles js ======-->
<script src="{{ url('/themes/landing/js/circles.min.js') }}"></script>

<!--====== Appear js ======-->
<script src="{{ url('/themes/landing/js/jquery.appear.min.js') }}"></script>

<!--====== WOW js ======-->
<script src="{{ url('/themes/landing/js/wow.min.js') }}"></script>

<!--====== Headroom js ======-->
<script src="{{ url('/themes/landing/js/headroom.min.js') }}"></script>

<!--====== Jquery Nav js ======-->
<script src="{{ url('/themes/landing/js/jquery.nav.js') }}"></script>

<!--====== Scroll It js ======-->
<script src="{{ url('/themes/landing/js/scrollIt.min.js') }}"></script>

<!--====== Magnific Popup js ======-->
<script src="{{ url('/themes/landing/js/jquery.magnific-popup.min.js') }}"></script>

<!--====== Main js ======-->
<script src="{{ url('/themes/landing/js/main.js') }}"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='{{ env("TAWKTO_EMBED_URL") }}';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->

<script type="text/javascript" id="cookieinfo"
        src="//cookieinfoscript.com/js/cookieinfo.min.js">
</script>


</body>

</html>
