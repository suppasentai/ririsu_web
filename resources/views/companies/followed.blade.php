@extends('layouts.userapp')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/card-grid.css') }}">
    @endsection

@section('content')
    <!--========Cards========-->
<div class="container-fluid main-cont">
        <div class="row news-row">
            <div class="container-fluid col-md-12 col-sm-6 justify-content-center news-block">
                <div class="card-group">
                    @foreach($companies as $company)
                        <div class="underlay">
                            <div class="card">
                                <div class="card-img-top" style="background-image: url('https://i.imgur.com/wLMJQPH.png')"></div>
                                <div class="card-body" >
                                <h5 class="card-title" style="font-family: 'Anton', sans-serif">Canon Unveils New Lens<hr></h5>
                                <p class="card-text" >Canon will have a full slate of new and updated products to show attendees at this year’s NAB Show. The company has announced its new Compact-Servo 70-200mm telephoto zoom lens <a href="#"><u>Read More...</u></a></p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                          </div>
                    @endforeach
                </div>
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
@endsection