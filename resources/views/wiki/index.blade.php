@include('wiki.layout.header', ['title' => 'Wiki'])
<div class="uk-section uk-section-muted">
    <div class="uk-container">
        <div class="uk-child-width-1-2@m uk-grid-match- uk-grid-small" data-uk-grid>
            @foreach($data as $unit)
                <div>
                    <div class="uk-card uk-card uk-card-default uk-card-hover uk-card-body uk-inline uk-border-rounded" style="width: 100%;">
                        <a class="uk-position-cover" href="{{ route('wiki.category', ['id' => $unit->id, 'title' => str_replace(' ', '-', $unit->title)]) }}"></a>

                        <div class="uk-grid-small" data-uk-grid>
                            <div class="uk-width-auto uk-text-primary uk-flex uk-flex-middle">
                                <span class="uk-margin-xsmall-top" data-uk-icon="icon: {{ $unit->icon }}; ratio: 2.6"></span>
                            </div>
                            <div class="uk-width-expand">
                                <h3 class="uk-card-title uk-margin-remove uk-text-primary">{{ $unit->title }}</h3>
                                <p class="uk-text-muted uk-margin-remove">{{ $unit->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="uk-section uk-section-muted">
    <div class="uk-container uk-container-small">
        <h2 class="uk-text-center">Frequently asked questions</h2>
        <ul class="uk-margin-medium-top" data-uk-accordion="multiple: true">
            <li>
                <a class="uk-accordion-title uk-box-shadow-hover-small" href="#">Do you provide customer support?</a>
                <div class="uk-article-content uk-accordion-content link-primary">
                    <p>At HOI4Intel, we do provide customer support to help you with any issues you may encounter while using our hosting bot. We offer support through our Discord server where you can get in touch with our team and receive the assistance you need.</p>
                    <h4>Who has the right for support?</h4>
                    <p>We provide support to all HOI4 servers who host games more than 2 times a week / are in partnership with HOI4Intel / have reached more than 1000 members.</p>
                    <h4>What's included in item support?</h4>
                    <p>Our support team is here to help you with the following:</p>
                    <ul>
                        <li>Answering any questions you have about how to use the bot.</li>
                        <li>Answering technical questions about the bot and any included third-party assets.</li>
                        <li>Helping you with any defects in the bot or third-party assets.</li>
                        <li>Providing updates to ensure the bot remains compatible and protected against security vulnerabilities.</li>
                        <li>Included version updates for all items.</li>
                    </ul>
                    <h4>What's not included in item support?</h4>
                    <p>Please note that item support does not include services to modify or extend the bot beyond the original features, style, and functionality described on the bot page. If you require customization services, we recommend contacting us to see if we offer paid customization services.</p>
                    <ul>
                        <li>Installation of the bot on your own server.</li>
                        <li>Hosting, server environment, or software.</li>
                        <li>Help from authors of included third-party assets.</li>
                    </ul>
                    <h4>Contacting support</h4>
                    <a target="_blank" href="https://discord.gg/world-war-community-820918304176340992"><p>Our support team is available from Monday to Friday through our item discord server. If you need any help, please don't hesitate to get in touch!</p></a>
                </div>
            </li>
            <!--
            <li>
                <a class="uk-accordion-title uk-box-shadow-hover-small" href="#">Are updates and bug fixes included in
                    the cost of the item?</a>
                <div class="uk-article-content uk-accordion-content link-primary">
                    <p>Regardless of whether you have support or not:</p>
                    <ul>
                        <li>When we release an update, it will be available for you to download for free</li>
                        <li>You can report bugs</li>
                        <li>You can expect us to keep the item in good working order, working as described and protected
                            against major security issues</li>
                    </ul>
                </div>
            </li>
            -->
        </ul>
    </div>
</div>

<div class="uk-section uk-section-muted">
    <div class="uk-container">
        <h2 class="uk-text-center">Didn't find an answer?</h2>
        <p class="uk-text-muted uk-text-center uk-text-lead">Our team is just a message away and ready to answer
            your questions</p>
        <div class="uk-margin-medium-top uk-flex-center uk-text-center uk-margin-medium-top uk-grid-small" data-uk-grid>
            <div>
                <div class="uk-card">
                    <img class="uk-avatar uk-border-circle" src="https://cdn.discordapp.com/avatars/231105080961531905/5cb3b799965cec055a4716a7a426493b.png?size=1024" alt="Ninjonik" />
                    <h5 class="uk-margin-remove-bottom uk-margin-small-top">Ninjonik</h5>
                    <p class="uk-article-meta uk-margin-xsmall-top">Discord Bot and Web Developer</p>
                </div>
            </div>
            <div>
                <div class="uk-card">
                    <img class="uk-avatar uk-border-circle" src="https://cdn.discordapp.com/avatars/718559880419475467/70fee7383c07e98e45b5ead159e9544c.png?size=1024" alt="Nullingo" />
                    <h5 class="uk-margin-remove-bottom uk-margin-small-top">Nullingo</h5>
                    <p class="uk-article-meta uk-margin-xsmall-top">Community Management and Partnerships</p>
                </div>
            </div>
        </div>
        <div class="uk-margin-medium-top uk-text-center"
             data-uk-scrollspy="cls: uk-animation-slide-bottom-medium; repeat: true">
            <a class="uk-button uk-button-primary uk-border-rounded" target="_blank" href="https://discord.gg/world-war-community-820918304176340992">Contact Us</a>
        </div>
    </div>
</div>

<div id="offcanvas-docs" data-uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" data-uk-close></button>
        <h5 class="uk-margin-top">Getting Started</h5>
        <ul class="uk-nav uk-nav-default doc-nav">
            <li class="uk-active"><a href="article.html">Template setup</a></li>
            <li><a href="article.html">Basic theme setup</a></li>
            <li><a href="article.html">Navigation bar</a></li>
            <li><a href="article.html">Footer options</a></li>
            <li><a href="article.html">Creating your first post</a></li>
            <li><a href="article.html">Creating docs posts</a></li>
            <li><a href="article.html">Enabling comments</a></li>
            <li><a href="article.html">Google Analytics</a></li>
        </ul>
        <h5 class="uk-margin-top">Product Features</h5>
        <ul class="uk-nav uk-nav-default doc-nav">
            <li><a href="article.html">Hero page header</a></li>
            <li><a href="article.html">Category boxes section</a></li>
            <li><a href="article.html">Fearured docs section</a></li>
            <li><a href="article.html">Video lightbox boxes section</a></li>
            <li><a href="article.html">Frequently asked questions section</a></li>
            <li><a href="article.html">Team members section</a></li>
            <li><a href="article.html">Call to action section</a></li>
            <li><a href="article.html">Creating a changelog</a></li>
            <li><a href="article.html">Contact form</a></li>
            <li><a href="article.html">Adding media to post and doc content</a></li>
            <li><a href="article.html">Adding table of contents to docs</a></li>
            <li><a href="article.html">Adding alerts to content</a></li>
        </ul>
        <h5 class="uk-margin-top">Customization</h5>
        <ul class="uk-nav uk-nav-default doc-nav">
            <li><a href="article.html">Translation</a></li>
            <li><a href="article.html">Customization</a></li>
            <li><a href="article.html">Development</a></li>
            <li><a href="article.html">Sources and credits</a></li>
        </ul>
        <h5 class="uk-margin-top">Help</h5>
        <ul class="uk-nav uk-nav-default doc-nav">
            <li><a href="article.html">Contacting support</a></li>
        </ul>
    </div>
</div>

@include('wiki.layout.footer')
