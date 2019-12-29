@extends('layouts.userapp')

@section('title', 'My Profile')

@section('head')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/start_card.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endsection

@section('content')
<!-- content-section 
    ================================================== -->
    <section id="content-section">
        <div class="container mt-2">
            <form id="register-form" method="POST" action="{{ route('end_start') }}">
                @csrf
                <div class="row justify-content-md-center">
                    <div class="title-section">
                        <h1><span>{{ __('Choose Industries you like') }}</span></h1>
                    </div>
                    <div class="row card-group">
                        @foreach($industries as $industry)
                            <div class="col-md-3 col-sm-4 mt-2 mb-2">
                                <div onclick="changeStatus({{ $industry->id }})" class="card card-block pt-1">
                                    <h4 class="card-title text-right">
                                        @if($industry->isFavoritedBy(Auth::user()))
                                            <i id="{{ $industry->id }}" class="fa fa-check-circle text-primary"></i>
                                        @else
                                            <i id="{{ $industry->id }}" class="material-icons"></i>
                                        @endif
                                    </h4>
                                    <img src="{{asset($industry->image)}}" alt="Photo of sunset">
                                    <h5 class="card-industryFavoriteStatustitle text-center mt-3 mb-3">{{$industry->title}}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="row justify-content-md-center" style="margin:50px">
                    <div class="title-section">
                        <h1><span>{{ __('Choose Industries you like') }}</span></h1>
                    </div>
                    <div class="card col-md-12  p-0">
                        <ul class="list-group list-group-flush">
                            <div class="row">
                                @foreach($tags as $tag)
                                    <div class="col-md-4">
                                        <li class="list-group-item">
                                            {{$tag->title}}
                                            <label class="switch ">
                                                <input type="checkbox" name={{$tag->id}} class="primary">
                                                <span class="slider"></span>
                                            </label>
                                        </li>
                                    </div>
                                @endforeach
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <button class="float-right" type="submit" value="Submit" id="submit-register2">
                        <i class="fa fa-paper-plane"></i> {{ __('Submit') }}
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('foot')
    <script>
        function changeStatus(id) {
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'industryFavoriteStatus/'+id,
                beforeSend: function () {
                    $("#"+id).removeClass("material-icons");
                    $("#"+id).removeClass("fa fa-check-circle text-primary");
                    $("#"+id).addClass("fa fa-refresh fa-spin");
                },
                success: function(result){
                    console.log(result)
                    if(result == 1){
                        $("#"+id).removeClass("material-icons");
                        $("#"+id).removeClass("fa fa-refresh fa-spin");
                        $("#"+id).addClass("fa fa-check-circle text-primary");
                    }else if(result == 0){
                        $("#"+id).removeClass("fa fa-check-circle");
                        $("#"+id).removeClass("fa fa-refresh fa-spin");
                        $("#"+id).addClass("material-icons");
                    }else{
                    }
                }
            });
        }
    </script>
@endsection