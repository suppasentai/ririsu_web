<div class="widget tags-widget">
    <h1>{{__('Tags')}}</h1>
    <ul class="tags-list">
        @foreach($tags as $tag)
            <li><a href="#">{{$tag->title}}</a></li>
        @endforeach
    </ul>
</div>