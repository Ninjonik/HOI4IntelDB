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
</head>

<body>

<header class="uk-background-primary uk-background-norepeat uk-background-cover uk-background-center-center uk-light"
        style="background-image: url({{ url('/themes/wiki/img/header.html') }});">
    <nav class="uk-navbar-container">
        <div class="uk-container">
            <div data-uk-navbar>
                <div class="uk-navbar-left">
                    <a class="uk-navbar-item uk-logo uk-visible@m" href="index-2.html">Guia</a>
                    <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas-docs" data-uk-toggle><span
                            data-uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Articles</span></a>
                </div>
                <div class="uk-navbar-center uk-hidden@m">
                    <a class="uk-navbar-item uk-logo" href="index-2.html">Guia</a>
                </div>
                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav uk-visible@m">
                        <li class="uk-active"><a href="index-2.html">Home</a></li>
                        <li ><a href="category.html">Category</a></li>
                        <li ><a href="article.html">Article</a></li>
                        <li ><a href="changelog.html">Changelog</a></li>
                        <li>
                            <a href="#">Dropdown</a>
                            <div class="uk-navbar-dropdown">
                                <ul class="uk-navbar-dropdown-nav uk-nav-parent-icon" data-uk-nav>
                                    <li><a href="#">Page one</a></li>
                                    <li><a href="#">Page two</a></li>
                                    <li><a href="#">Page three</a></li>
                                    <li class="uk-parent">
                                        <a href="#">Parent</a>
                                        <ul class="uk-nav-sub">
                                            <li><a href="#">Sub item</a></li>
                                            <li><a href="#">Sub item</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="uk-navbar-item">
                                <a class="uk-button uk-button-small uk-button-primary-outline" href="contact.html">Contact</a>
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
                <form class="uk-search uk-search-default uk-width-1-1" name="search-hero" onsubmit="return false;">
                    <span data-uk-search-icon="ratio: 1.2"></span>
                    <input id="search-hero" class="uk-search-input uk-form-large uk-border-rounded" type="search"
                           placeholder="Search for answers" autocomplete="off" data-minchars="1" data-maxitems="30">
                </form>
            </div>
        </div>
    </div>
</header>
