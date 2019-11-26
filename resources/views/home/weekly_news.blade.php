<div class="more-from-news">
    <h1>{{__('Weekly Top News')}}</h1>
    <div class="row">
        @each('home.weekly_new', $news, 'new')
    </div>
</div>