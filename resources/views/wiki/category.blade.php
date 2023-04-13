@include('wiki.layout.header', ['title' => 'Category'])

<div class="uk-section uk-section-muted">
    <div class="uk-container">
        <ul class="uk-breadcrumb">
            <li><a href="{{ route('wiki') }}">Help Center</a></li>
            <li><span>{{ $category->title }}</span></li>
        </ul>
        <div class="uk-grid-small" data-uk-grid>
            <div class="uk-width-auto uk-text-primary">
                <span class="uk-margin-xsmall-top" data-uk-icon="icon: {{ $category->icon }}; ratio: 2.6"></span>
            </div>
            <div class="uk-width-expand">
                <h1 class="uk-article-title uk-margin-remove">{{ $category->title }}</h1>
                <p class="uk-text-lead uk-text-muted uk-margin-small-top">{{ $category->description }}</p>
            </div>
        </div>
        <div class="uk-margin-medium-top">
            @foreach($articles as $article)
                <div class="uk-card uk-card-category uk-card-default uk-card-hover uk-card-body uk-inline uk-border-rounded uk-width-1-1">
                    <a class="uk-position-cover" href="{{ route('wiki.article', ['id' => $article->id, 'title' => Str::slug($article->title)]) }}"></a>
                    <h3 class="uk-card-title uk-margin-remove uk-text-primary">{{ $article->title }}</h3>
                    @php
                        // Remove HTML tags and images from the content
                        $content = preg_replace('/<[^>]+>|<img[^>]+>/i', '', $article->content);
                        // Truncate the content to 100 characters, preserving full words
                        $truncatedContent = Str::words($content, 100, '...');
                    @endphp
                    <p class="uk-margin-small-top">{{ $truncatedContent }}</p>
                    <div class="uk-article-meta uk-flex uk-flex-middle">
                        <img class="uk-border-circle uk-avatar-small" src="{{ getAvatarFunction(100, $article->edit_author_id) }}" alt="Sara Galen">
                        <div>
                            Written by {{ $article->author_name }}
                            <time class="uk-margin-small-right" datetime="2019-10-05">{{ $article->created_at }}</time><br>
                            Updated by {{ $article->editor_name }} <time datetime="2019-12-30">{{ $article->updated_at }}</time>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="uk-text-center uk-margin-medium-top">
            <a href="#"><div class="uk-margin-small-right uk-text-normal" data-uk-spinner="ratio: 0.6"></div>Load more</a>
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
