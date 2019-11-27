<div class="widget news-widget">
    <h1>{{__('Last news as list titles...')}}</h1>
    <ul class="list-news">
        @foreach($lasted_news as $new)
            <li>
            <h2><a href="{{ route('releases.show', ['slug' => $new->slug])}}">{!! Illuminate\Support\Str::limit($new->title, 40, ' ...') !!}</a></h2>
            </li>
        @endforeach
    </ul>
</div>