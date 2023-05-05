<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOI4Intel | {{ $title }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ url('/themes/steam/img/favicon.png') }}" >
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/themes/wiki/css/main.css') }}" />
    <script src="{{ url('/themes/wiki/js/uikit.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta content="Discord - Free Voice and Text Chat" property="og:title">
    <meta content="All-in-one voice and text chat for gamers that's free, secure, and works on both your desktop and phone.
    Stop paying for TeamSpeak servers and hassling with Skype. Simplify your life." property="og:description">
    <meta content='https://discordapp.com/assets/ba74954dde74ff40a32ff58069e78c36.png' property='og:image'>
    <link type="application/json+oembed" href="https://owo.whats-th.is//e61180.json" />
    <meta name="theme-color" content="#7289DA">
    <meta name="twitter:card" content="summary_large_image">
</head>

<body>

<header class="uk-background-primary uk-background-norepeat uk-background-cover uk-background-center-center uk-light"
        style="background-image: url({{ url('/themes/wiki/img/header.html') }});">
    <nav class="uk-navbar-container">
        <div class="uk-container">
            <div data-uk-navbar>
                <div class="uk-navbar-left">
                    <a class="uk-navbar-item uk-logo uk-visible@m" href="{{ route('wiki') }}">HOI4Intel</a>
                </div>
                <div class="uk-navbar-center uk-hidden@m">
                    <a class="uk-navbar-item uk-logo" href="index-2.html">HOI4Intel</a>
                </div>
                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav uk-visible@m">
                        <li class="uk-active"><a href="{{ route('wiki') }}">Home</a></li>
                        <li>
                            <div class="uk-navbar-item">
                                <a class="uk-button uk-button-small uk-button-primary-outline" target="_blank" href="https://discord.gg/world-war-community-820918304176340992">Contact</a>
                            </div>
                        </li>
                    </ul>
                    <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas" data-uk-toggle><span
                            data-uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="uk-section uk-position-relative uk-position-z-index" data-uk-scrollspy="cls: uk-animation-slide-bottom-medium; repeat: true">
        <div class="uk-container">
            <h1 class="uk-text-center uk-margin-remove-top">How can we help you?</h1>
            <div class="hero-search uk-margin-medium-top">
                <form class="uk-search uk-search-default uk-width-1-1" name="search-hero" method="POST" action="{{ route('wiki.search') }}">
                    @csrf
                    <span data-uk-search-icon="ratio: 1.2"></span>
                    <input name="query" id="search-hero" class="uk-search-input uk-form-large uk-border-rounded" type="search"
                           placeholder="Search for answers" autocomplete="off" data-minchars="1" data-maxitems="30">
                </form>
            </div>

        </div>
    </div>
</header>
