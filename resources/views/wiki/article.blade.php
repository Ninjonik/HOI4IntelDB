@include('wiki.layout.header', ['title' => 'Wiki Article'])

<div class="uk-section uk-section-muted">
    <div class="uk-container">
        <ul class="uk-breadcrumb uk-margin-medium-top-">
            <li><a href="index-2.html">Help Center</a></li>
            <li><a href="category.html">Getting Started</a></li>
            <li><span>Template setup</span></li>
        </ul>
        <div class="uk-background-default uk-border-rounded uk-box-shadow-small">
            <div class="uk-container uk-container-xsmall uk-padding-large">
                <article class="uk-article">
                    <h1 class="uk-article-title">How does the template integrate with my existing website design?</h1>
                    <div class="uk-article-meta uk-margin uk-flex uk-flex-middle">
                        <img class="uk-border-circle uk-avatar-small" src="img/avatar-sara.html" alt="Sara Galen">
                        <div>
                            Written by Sara Galen
                            <time class="uk-margin-small-right" datetime="2019-10-05">October 5 2019</time><br>
                            Updated <time datetime="2019-12-30">December 30 2019</time>
                        </div>
                    </div>
                    <p class="uk-text-lead uk-text-muted">Lorem ipsum dolor sit adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliquat aliquip.</p>
                    <div class="uk-article-content">
                        <p>Still too and presented. Eyes workers, and a just that chosen proportion your it exploration, joke.
                            Of beacon because phase pouring state into them. Either one for been sublime parts global of postage
                            enjoying those it can the privilege a and, soon up privilege is the to the card blind to feel borne
                            more, you of for its always sort listen. Of woke show have by mental okay. By accept with and worthy
                            to uneasiness, snow avoid part the remedies.</p>
                        <div class="language-bash highlighter-rouge">
                            <div class="highlight">
                                <pre class="highlight"><code>bundle install</code></pre>
                            </div>
                        </div>
                        <p>Opinion, a between of make feedback quite like a man frame. Hiding of
                            a ask the <a href="#">English version</a> the alone, was didn't my a use. Of the for but may to behind on may so let in
                            wasn't allows a her his century and interaction.</p>
                        <ul>
                            <li>When we release an update, it will be available for you to download for free</li>
                            <li>You can report bugs</li>
                            <li>You can expect us to keep the item in good working order, working as described and protected
                                against major security issues</li>
                        </ul>
                        <p>The been have from pros a to opinion, a between of make feedback quite like a man frame. Hiding of
                            a ask the english the alone, was didn't my a use. Of the for but may to behind on may so let in
                            wasn't allows a her his century and interaction <a href="#">some link</a> to a website.</p>
                        <p>Musce libero nunc, dignissim quis turpis quis, semper vehicula dolor. Suspendisse tincidunt consequat quam,
                            ac posuere leo dapibus id. Cras fringilla convallis elit, at eleifend mi interam.</p>
                        <p>Nulla non sollicitudin. Morbi sit amet laoreet ipsum, vel pretium mi. Morbi varius, tellus in accumsan
                            blandit, elit ligula eleifend velit, luctus mattis ante nulla condimentum nulla. Etiam vestibulum risus vel
                            arcu elementum eleifend. Cras at dolor eget urna varius faucibus tempus in elit.</p>
                        <h2 id="image-lightbox-example">Image Lightbox Example</h2>
                        <p>Nunc porta malesuada porta. Etiam tristique vestibulum dolor at ultricies. Proin hendrerit sapien sed erat
                            fermentum, at commodo velit consectetur.</p>
                        <figure data-uk-lightbox="animation: slide">
                            <a class="uk-inline" href="https://images.unsplash.com/photo-1531482615713-2afd69097998?crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;h=700&amp;ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY3NDM1NDExNQ&amp;ixlib=rb-4.0.3&amp;q=80&amp;utm_campaign=api-credit&amp;utm_medium=referral&amp;utm_source=unsplash_source&amp;w=1000" data-caption="Image in lightbox">
                                <img src="https://source.unsplash.com/IgUR1iX0mqM/650x350" alt="Alt for image">
                                <div class="uk-position-center">
                                    <span data-uk-overlay-icon></span>
                                </div>
                            </a>
                            <figcaption data-uk-grid class="uk-flex-right uk-grid uk-grid-stack"><span
                                    class="uk-width-auto uk-first-column">Image in lightbox</span></figcaption>
                        </figure>
                        <p>Etiam vestibulum risus vel arcu elementum eleifend. Cras at dolor eget urna varius faucibus tempus in elit.
                            Cras a dui imperdiet, tempus metus quis, pharetra turpis. Phasellus at massa sit amet ante semper fermentum
                            sed eget lectus. Quisque id dictum magna, et dapibus turpis.</p>
                        <h2 id="example-of-code-block">Example Of Code Block</h2>
                        <p>In accumsan lacus ac neque maximus dictum. Phasellus eleifend leo id mattis bibendum. Curabitur et purus
                            turpis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
                        <div class="language-html highlighter-rouge">
                            <div class="highlight">
<pre class="highlight"><code><span class="nt">&lt;head&gt;</span>
  <span class="nt">&lt;meta</span> <span class="na">charset=</span><span class="s">"utf-8"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;meta</span> <span class="na">http-equiv=</span><span class="s">"X-UA-Compatible"</span> <span class="na">content=</span><span class="s">"IE=edge"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;meta</span> <span class="na">name=</span><span class="s">"viewport"</span> <span class="na">content=</span><span class="s">"width=device-width, initial-scale=1"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;link</span> <span class="na">rel=</span><span class="s">"stylesheet"</span> <span class="na">href=</span><span class="s">"/assets/css/main.css"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;link</span> <span class="na">rel=</span><span class="s">"shortcut icon"</span> <span class="na">type=</span><span class="s">"image/png"</span> <span class="na">href=</span><span class="s">"/assets/img/favicon.png"</span> <span class="nt">&gt;</span>
  <span class="nt">&lt;script </span><span class="na">src=</span><span class="s">"/assets/js/main.js"</span><span class="nt">&gt;&lt;/script&gt;</span>
<span class="nt">&lt;/head&gt;</span>
</code></pre>
                            </div>
                        </div>
                        <h2 id="text-and-quote">Text and Quote</h2>
                        <p>Cras at dolor eget urna varius faucibus tempus in elit. Cras a dui imperdiet, tempus metus quis, pharetra
                            turpis. Phasellus at massa sit amet ante semper fermentum sed eget lectus. Quisque id dictum magna turpis.</p>
                        <blockquote>
                            <p>Etiam vestibulum risus vel arcu elementum eleifend. Cras at dolor eget urna varius faucibus tempus in elit.
                                Cras a dui imperdiet</p>
                        </blockquote>
                        <p>In accumsan lacus ac neque maximus dictum. Phasellus eleifend leo id mattis bibendum. Curabitur et purus
                            turpis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
                        <p>Etiam in fermentum mi. Sed et tempor felis, eu aliquet nisi. Nam eget ullamcorper arcu. Nunc porttitor nisl a
                            dolor blandit, eget consequat sem maximus. Phasellus lacinia quam porta orci malesuada, vel tincidunt.</p>

                        <div class="share uk-text-center uk-margin-large-top">
                            <p>Did this article answer your question?</p>
                            <a href="#" title="Dislike"><span class="uk-icon-button uk-text-primary" data-uk-icon="icon: close; ratio: 1.2"></span></a>
                            <a class="uk-margin-small-left"
                               href="#" title="Like"><span class="uk-icon-button uk-text-primary" data-uk-icon="icon: check; ratio: 1.2"></span></a>
                        </div>
                    </div>
                    <div class="uk-margin-large-top paginate-post">
                        <div class="uk-child-width-expand@s uk-grid-large" data-uk-grid>
                            <div>
                                <h5>Category boxes section</h5>
                                <div><a class="uk-remove-underline hvr-back" href="article.html">&larr; Previuos</a></div>
                            </div>
                            <div class="uk-text-right">
                                <h5>Basic theme setup</h5>
                                <div><a class="uk-remove-underline hvr-forward" href="article.html">Next	&rarr;</a></div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
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
