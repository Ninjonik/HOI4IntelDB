@include('wiki.layout.header', ['title' => 'Search'])

<div class="uk-section uk-section-muted">
    <div class="uk-container">
        <ul class="uk-breadcrumb">
            <li><a href="{{ route('wiki') }}">Help Center</a></li>
            <li><span>Search results for {{ $query }}</span></li>
        </ul>
        <div class="uk-grid-small" data-uk-grid>
            <div class="uk-width-auto uk-text-primary">
                <span class="uk-margin-xsmall-top" data-uk-icon="icon: search; ratio: 2.6"></span>
            </div>
            <div class="uk-width-expand">
                <h1 class="uk-article-title uk-margin-remove">Results for {{ $query }}</h1>
                <p class="uk-text-lead uk-text-muted uk-margin-small-top">Showing {{ $articles->count() }} results ({{ round(microtime(true) - LARAVEL_START, 2) }} seconds) </p>
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
    </div>
</div>

@include('wiki.layout.footer')
