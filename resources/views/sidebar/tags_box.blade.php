<div class="widget tags-widget">
    <h1>{{__('Tags')}}</h1>
    <ul class="tags-list">
        @foreach($tags as $tag)
            <li><a href="{{ route('tags.show', ['id' => $tag->id])}}">{{$tag->title}}</a></li>
        @endforeach
    </ul>
</div>