<div class="posts-block featured-box">
    <div class="title-section">
        <h1>{{__('Featured')}}</h1>
    </div>

    <div class="owl-wrapper">
        <div class="owl-carousel" data-num="3">
            @each('home.featured_new', $featured_news, 'new')

        </div>
    </div>
</div>