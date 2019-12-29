@extends('layouts.userapp')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/card-grid.css') }}">
    @endsection

@section('content')
    <!--========Cards========-->
    <section id="content-section">
        <div class="container-fluid main-cont">
          <div class="row news-row m-0">
              <div class="container-fluid col-md-12 col-sm-6 justify-content-center news-block">
                  <div class="title-section text-center">
                    <h1><span>{{ __('Following Companies') }}</span></h1>
                  </div>
                  <div class="card-group">
                    @foreach($companies as $company)
                    <div class="underlay">
                      <div class="card">
                          @if(isset($company->image))
                            <div class="card-img-top" style="background-image: url('{{$company->image}}')"></div>
                          @endif
                          <div class="card-body" >
                          <h5 class="card-title" style="font-family: 'Anton', sans-serif">{{$company->title}}<hr></h5>
                          <h6 class="card-subtitle mb-2 text-muted">{{$company->industry_ref}}</h6>
                          @if($company->releases->count()>=3)
                          <div class="bd-example">
                              <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                  <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                  <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    
                                    <div class="carousel-item active">
                                      <img src="{{$company->releases[0]->image}}" class="d-block w-100" alt="...">
                                      <div class="fixed-bottom p-0 carousel-caption d-none d-md-block">
                                          <a href="{{ route('releases.show', ['slug' => $company->releases[0]->slug])}}" class="text-white bg-secondary"><b>{{$company->releases[0]->title}}</b></a>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                      <img src="{{$company->releases[1]->image}}" class="d-block w-100" alt="...">
                                      <div class="fixed-bottom p-0  carousel-caption d-none d-md-block">
                                          <a href="{{ route('releases.show', ['slug' => $company->releases[0]->slug])}}" class="text-white bg-secondary"><b>{{$company->releases[0]->title}}</b></a>
                                      </div>
                                    </div>
                                    <div class="carousel-item">
                                      <img src="{{$company->releases[2]->image}}" class="d-block w-100" alt="...">
                                      <div class="fixed-bottom p-0  carousel-caption d-none d-md-block">
                                          <a href="{{ route('releases.show', ['slug' => $company->releases[0]->slug])}}" class="text-white bg-secondary"><b>{{$company->releases[0]->title}}</b></a>
                                      </div>
                                    </div>
                                  
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                                <button class="mt-2 btn btn-info btn-sm action-follow" data-id="{{ $company->id }}"><strong>
                                    @if(Auth::user()->isFollowing($company))
                                        UnFollow
                                    @else
                                        Follow
                                    @endif
                                    </strong>
                                </button>
                              </div>
                              
                            </div>
                            @endif
                            
                                    
                                  <ul class="list-news card-text">
                          
                                      <li>
                                        <h2>{{__('URL:')}} <a href="#" class="autor-site">{{$company->url}}</a></h2>
                                      </li>
                                      <li>
                                          <h2>{{__('Head office location:')}} <span>{{$company->location}}</span></h2>
                                      </li>
                                      <li>
                                          <h2>{{__('Contact No.:')}} <span>{{$company->tel}}</span></h2>
                                      </li>
                                      <li>
                                          <h2>{{('Representative\'s name')}} <span>{{$company->representative_name}}</span></h2>
                                      </li>
                                  </ul>
                                  
                          </div>
                      </div>
                    </div>
                  @endforeach
                </div>
                {{ $companies->links() }}

            </div>
        </div>
    </div>
    <!------------------------>
@endsection
@section('foot')
<!--=======Scripts======-->
  <script>
    var main = function () {
      
        $('.card').on('mouseenter', function() {
          $(this).find('.card-text').slideDown(300);
        });
      
        $('.card').on('mouseleave', function(event) {
            $(this).find('.card-text').css({
              'display': 'none'
            });
          });
    };
    
    $(document).ready(main);
  </script>
  <script name="toggle-grid" type="text/javascript">
  $(document).ready(function(){
    $(document).on("keypress", function(event) {
      // If 'alt + g' keys are pressed:
      if (event.which === 169){
          $('#toggle-grid').toggle();
      }
    });

    $('#toggle-grid').on("click"
    , function() {
        $('.pixel-grid').toggle();
        $('#toggle-grid').toggleClass('orange');
      });
  });
  </script>
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
@endsection