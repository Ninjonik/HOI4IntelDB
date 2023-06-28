<div id="offcanvas" data-uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar">
        <a class="uk-logo" href="{{ route('wiki') }}">HOI4Intel</a>
        <button class="uk-offcanvas-close" type="button" data-uk-close></button>
        <ul class="uk-nav uk-nav-primary uk-nav-offcanvas uk-margin-top uk-text-center">
            <li class="uk-active"><a href="{{ route('wiki') }}">Home</a></li>
            <li>
                <div class="uk-navbar-item"><a class="uk-button uk-button-primary" target="_blank" href="https://discord.gg/world-war-community-820918304176340992">Contact</a></div>
            </li>
        </ul>
    </div>
</div>

<footer class="uk-section uk-text-center uk-text-muted">
    <div class="uk-container uk-container-small">
        <div class="uk-margin-medium">
            <div data-uk-grid class="uk-child-width-auto uk-grid-small uk-flex-center">
                <div class="uk-first-column">
                    <a href="https://discord.gg/world-war-community-820918304176340992" target="_blank"><i class="fa-brands fa-discord"></i></a>
                </div>
            </div>
        </div>
        <div class="uk-margin-medium uk-text-small uk-link-muted">&copy HOI4Intel 2023, Design by <a
                href="https://unbound.studio/">Unbound Studio</a></div>
    </div>
</footer>

<script src="{{ url('/themes/wiki/js/awesomplete.js') }}"></script>
<script src="{{ url('/themes/wiki/js/custom.js') }}"></script>

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

</body>

</html>
