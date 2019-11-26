<div class="widget slider-widget">
    <h1>{{__('Featured Posts')}}</h1>
    <div class="flexslider">
        <ul class="slides">
            @each('sidebar.featured_new', $featured_news,'new')
        </ul>
    </div>
</div> 