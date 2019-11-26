    <!-- Sidebar -->
    <div class="sidebar theiaStickySidebar">
        <div class="search-widget widget">
            <form>
                <input type="search" placeholder="Search for..."/>
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <div class="widget social-widget">
            <h1>{{__('Stay Connected ')}}</h1>
            <p>{{__('Do you want to be informed everytime with our latest news?')}}</p>
            <ul class="social-share">
                <li>
                    <a href="#" class="rss">
                        <i class="fa fa-rss"></i>
                        <span>345</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="facebook">
                        <i class="fa fa-facebook"></i>
                        <span>3,460</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="twitter">
                        <i class="fa fa-twitter"></i>
                        <span>5,600</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="google">
                        <i class="fa fa-google-plus"></i>
                        <span>659</span>
                    </a>
                </li>
            </ul>
        </div>
        
        @include('sidebar.featured_box')
        
        @include('sidebar.todayfeatured_box')

        @include('sidebar.lasted_box')

        <div class="advertisement">
            <a href="#"><img src="upload/addsense/300x250.jpg" alt=""></a>
        </div>
        
        @include('sidebar.widget_box')

        @include('sidebar.tags_box')

    </div>
