@include('wiki.layout.header', ['title' => 'Wiki Article', 'og_title' => $article->title])

<div class="uk-section uk-section-muted">
    <div class="uk-container">
        <ul class="uk-breadcrumb uk-margin-medium-top-">
            <li><a href="{{ route('wiki') }}">Help Center</a></li>
            <li><a href="{{ route('wiki.category', ['id' => $article->category_id, 'title' => str_replace(' ', '-', $article->category_title)]) }}">{{ $article->category_title }}</a></li>
            <li><span>{{ $article->title }}</span></li>
        </ul>
        <div class="uk-background-default uk-border-rounded uk-box-shadow-small">
            <div class="uk-container uk-container-xsmall uk-padding-large">
                <article class="uk-article">
                    <h1 class="uk-article-title">{{ $article->title }}</h1>
                    <div class="uk-article-meta uk-margin uk-flex uk-flex-middle">
                        <img class="uk-border-circle uk-avatar-small" src="{{ getAvatarFunction(100, $article->edit_author_id) }}" alt="Sara Galen">
                        <div>
                            Written by {{ $article->author_name }}
                            <time class="uk-margin-small-right" datetime="2019-10-05">{{ $article->created_at }}</time><br>
                            Updated by {{ $article->editor_name }} <time datetime="2019-12-30">{{ $article->updated_at }}</time>
                        </div>
                    </div>
                    <div class="uk-article-content">
                        {!! $article->content !!}
                    </div>
                    <div class="uk-margin-large-top paginate-post">
                        <div class="uk-child-width-expand@s uk-grid-large" data-uk-grid>
                            @if ($previousArticleId)
                                <div>
                                    <h5>{{ $previousArticleDisplayTitle }}</h5>
                                    <div><a class="uk-remove-underline hvr-back" href="{{ route('wiki.article', ['id' => $previousArticleId, 'title' => $previousArticleTitle]) }}">&larr; Previous</a></div>
                                </div>
                            @endif
                            @if ($nextArticleId)
                                    <div class="uk-text-right">
                                        <h5>{{ $nextArticleDisplayTitle }}</h5>
                                        <div><a class="uk-remove-underline hvr-forward" href="{{ route('wiki.article', ['id' => $nextArticleId, 'title' => $nextArticleTitle]) }}">Next	&rarr;</a></div>
                                    </div>
                            @endif
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
