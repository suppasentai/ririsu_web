<div class="widget news-widget">
    <h1>{{__('Today Featured')}}</h1>
    <ul class="small-posts">
        @each('sidebar.todayfeatured_new', $news, 'new')
    </ul>
</div>