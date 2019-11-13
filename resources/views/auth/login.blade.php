<!doctype html>


<html lang="en" class="no-js">

<!-- Mirrored from nunforest.com/minberi-mag/underconstruction.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Sep 2019 05:56:34 GMT -->
<head>
	<title>MinberiMAG</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/modernmag-assets.min.css">

</head>
<body class="underconstruction">

	<!-- Container -->
	<div id="container">
        <!-- comming-soon-page -->
        <div id="comming-soon-content">
            <div class="container">
                <div class="logo-place">
                    <a href="index.html"><img src="images/biglogo_200x200.png" alt=""></a>
                    <p>Newspaper &amp; Editorial Magazine</p>
                </div>

                <div class="row justify-content-md-center">
                    <aside class="col-sm-6">
                    
                    <div class="card">
                    <article class="card-body">
                        <a href="{{ route('register') }}" class="float-right btn btn-outline-primary">{{__("Sign up")}}</a>
                        <h4 class="card-title mb-4 mt-1">{{__("Sign in")}}</h4>
                        <p>
                            <a href="" class="btn btn-block btn-outline-info"> <i class="fa fa-twitter"></i>{{__("   Login via Twitter")}}</a>
                            <a href="" class="btn btn-block btn-outline-primary"><i class="fa fa-facebook"></i>{{__("   Login via facebook")}}</a>
                        </p>
                        <hr>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <input id="password" name="password" type="password" placeholder="******" class="@error('password') is-invalid @enderror form-control" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> <!-- form-group// --> 
                            <div class="ml-4 form-group">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label  for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div> <!-- form-group// -->                                      
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block"> {{ __('Login') }}  </button>
                                    </div> <!-- form-group// -->
                                </div>
                                
                                @if (Route::has('password.request'))
                                    <div class="col-md-6 text-right">
                                        <a class="small" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                    </div>
                                @endif                                     
                            </div> <!-- .row// -->                                                                  
                        </form>
                    </article>
                    </div> <!-- card.// -->
                    
                        </aside> <!-- col.// -->
                </div>

                <div class="social-box">
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="youtube" href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a class="vimeo" href="#"><i class="fa fa-vimeo-square"></i></a></li>
                        <li><a class="dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a class="flickr" href="#"><i class="fa fa-flickr"></i></a></li>
                        <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
                    </ul>
                </div>

            </div>
            
        </div>
        <!-- End comming-soon-page -->
	</div>

    <script src="js/modernmag-plugins.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCiqrIen8rWQrvJsu-7f4rOta0fmI5r2SI&amp;sensor=false&amp;language=en"></script>
	<script src="js/gmap3.min.js"></script>
	<script src="js/script.js"></script>
</body>

<!-- Mirrored from nunforest.com/minberi-mag/underconstruction.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Sep 2019 05:56:34 GMT -->
</html>
