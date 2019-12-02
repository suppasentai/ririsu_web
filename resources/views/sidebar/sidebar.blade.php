<!-- Sidebar -->
<div class="sidebar theiaStickySidebar">
    <ul class="author-list">
        <li>
            <div class="autor-box">
                <div class="autor-content ml-0">
                    <div class="autor-title">
                        <h1><span>{{Auth::user()->name}}</span><a href="autor-details.html">{{Auth::user()->articles()->count()}}</a></h1>
                        <ul class="autor-social">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" class="dribble"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                        <button class="btn btn-info btn-sm action-follow" data-id="{{ $release->company->id }}"><strong>
                            @if(Auth::user()->isFollowing($release->company))
                                UnFollow
                            @else
                                Follow
                            @endif
                            </strong>
                        </button>
                        <ul class="list-news">
                            
                            <li>
                                <h2>{{__('URL:')}} <span>URL</span></h2>
                            </li>
                            <li>
                                <h2>{{__('Head office location:')}} <span>URL</span></h2>
                            </li>
                            <li>
                                <h2>{{__('Contact No.')}} <span>URL</span></h2>
                            </li>
                            <li>
                                <h2>{{('Representative\'s name')}} <span>URL</span></h2>
                            </li>
                            <li><a href="" title="">Business <span class="pull-right">13</span></a></li>
                        </ul>
                    </div>

                </div>
                <div class="autor-last-line p-0">
                        <ul class="autor-tags">
                            <li><span><i class="fa fa-align-justify" aria-hidden="true"></i>Category</span></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Politics</a></li>
                            <li><a href="#">Sport</a></li>
                        </ul>
                        <a href="#" class="autor-site">http://www.janesmith.com</a>
                    </div>
            </div>
        </li>
    </ul>
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

    <script>
        $(document).ready(function() {     

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
    
        $('.action-follow').click(function(){    
            var company_id = $(this).data('id');
            var cObj = $(this);
            var c = $(this).parent("div").find(".tl-follower").text();
    
    
            $.ajax({
                type:'POST',
                url:'/dashboard/follow_company',
                data:{company_id:company_id},
                success:function(data){
                    console.log(data.success);
                    if(jQuery.isEmptyObject(data.success.attached)){
                    cObj.find("strong").text("Follow");
                    cObj.parent("div").find(".tl-follower").text(parseInt(c)-1);
                    }else{
                    cObj.find("strong").text("UnFollow");
                    cObj.parent("div").find(".tl-follower").text(parseInt(c)+1);
                    }
                }
            });
        });      
    
    
    }); 
    </script>

</div>