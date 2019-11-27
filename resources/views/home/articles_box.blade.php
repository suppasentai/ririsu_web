<!-- Posts-block -->
<div class="posts-block articles-box">
    <div class="title-section">
        <h1>{{__('News')}}</h1>
    </div>
    
    @each('home.news_post', $news, 'new')
    {{ $news->links() }}
</div>
<!-- End Posts-block -->