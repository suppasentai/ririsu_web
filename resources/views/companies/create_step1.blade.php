@extends('layouts.app')

@section('title', 'Company Form')

@section('head')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css" />

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/style-wizard.css') }}">
@endsection

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-8 col-sm-9 col-md-8 col-lg-8 col-xl-8 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2 id="heading">{{__('Sign Up Company Account')}}</h2>
                <p>{{__('Fill all form field to go to next step')}}</p>
                <form id="msform" form method="POST" action="{{ route('post_create_step1') }}"  enctype = 'multipart/form-data'>
                    @csrf
                    <!-- progressbar -->
                    <ul id="progressbar" class="row justify-content-center">
                        <li class="active fa fa-building"><strong>{{__('Company')}}</strong></li>
                        <li id="personal"><strong>{{__('Personal')}}</strong></li>
                        {{-- <li id="payment"><strong>Image</strong></li> --}}
                        <li id="confirm"><strong>{{__('Finish')}}</strong></li>
                    </ul>
                    <p>Used by 31.4159% of listed companies in Middle Earth, so far more than 33,000 companies have distributed press releases and news releases on Ririsu.
                        Click here for the features of <a href='/about'>Ririsu</a>, which has the largest share of press releases. Click here for pricing plans.
                        If you have any questions regarding use or application, please <a href=''>contact us</a>.</p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br> <!-- fieldsets -->
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    {{-- CLIENT --}}
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">{{__('Company Information:')}}</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">{{__('Step 1 - 3')}}</h2>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="fieldlabels" for="title">{{ __('Corporate name:*') }}</label>
                                    <input id="title" type="text" name="title" class="@error('title') is-invalid @enderror bg-light" value="{{ old('title') }}" required autocomplete="title" placeholder="Corporate name">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label  class="fieldlabels" for="representative_name">{{ __('Representative Name:*') }}</label>
                                    <input id="representative_name" name="representative_name" class="@error('representative_name') is-invalid @enderror bg-light" value="{{ old('representative_name') }}" type="text" placeholder="Representative Name">
                                    @error('representative_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="fieldlabels" for="identification_code">{{ __('Corporate ID:*') }}</label>
                                    <input id="identification_code" name="identification_code" class="@error('identification_code') is-invalid @enderror bg-light" value="{{ old('identification_code') }}" type="text" required placeholder="Identification Code">
                                    @error('identification_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label class="fieldlabels" for="tel">{{ __('Contact No.:') }}</label>
                                    <input id="tel" type="tel" class="@error('tel') is-invalid @enderror bg-light" name="tel" value="{{ old('tel') }}" required placeholder="Contact No.">
                                    @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="fieldlabels" for="location">{{ __('Location:*') }}</label>
                                    <input id="location" name="location" class="@error('location') is-invalid @enderror bg-light" type="text" value="{{ old('location') }}" required placeholder="Location">
                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="fieldlabels" for="email">{{ __('Contact E-mail:*') }}</label>
                                    <input id="email" type="text" class="@error('email') is-invalid @enderror bg-light" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="fieldlabels" for="url">{{ __('Corporate URL:') }}</label>
                                    <input id="url" class="@error('url') is-invalid @enderror bg-light" name="url" type="text" placeholder="Corporate URL">
                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="fieldlabels" for="employees_number">{{ __('Employees Number:') }}</label>
                                    <input id="employees_number" class="@error('employees_number') is-invalid @enderror bg-light" name="employees_number" type="number" min="1" placeholder="">
                                    @error('employees_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label class="fieldlabels" for="capital_stock">{{ __('Capital Stock (USD):') }}</label>
                                    <input id="capital_stock" class="@error('capital_stock') is-invalid @enderror bg-light" type="number" min="1" step="1"  name="capital_stock" placeholder="">
                                    @error('capital_stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="fieldlabels" for="incorp_date">{{ __('Incorporation Date:') }}</label>
                                    <input id="incorp_date" class="@error('incorp_date') is-invalid @enderror bg-light" name="incorp_date" value="{{ old('incorp_date') }}" placeholder="Incoporation Date">
                                    @error('incorp_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <script>
                                        $('#incorp_date').datepicker();
                                    </script>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="industry_ref" class="control-label">{{__("Industry:*")}}</label>
                                    <select class="form-control rounded-0 bg-light" id="industry_ref" name="industry_ref">
                                        @foreach( $industries as $industry )
                                            <option value="{{ $industry->title }}">{{ $industry->title }}</option>
                                        @endforeach
                                    </select>
                  
                                    @if ($errors->has('grade_ref'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('grade_ref') }}</strong>
                                      </span>
                                    @endif
                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div> 
                        <input type="button" name="next" class="next action-button" id="nextCompany" value="Next" />
                    </fieldset>
                    {{-- END CLIENT --}}
                    {{-- USER --}}
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                <h2 class="fs-title">{{__('Personal Information:')}}</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">{{__('Step 2 - 3')}}</h2>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="first_name">{{ __('First Name*') }}</label>
                                    <input id="first_name" type="text" class="@error('first_name') is-invalid @enderror" name="first_name" required autocomplete="first_name">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name">{{ __('Last Name*') }}</label>
                                    <input id="last_name" name="last_name" type="text" class="@error('last_name') is-invalid @enderror" required autocomplete="last_name">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="user_email">{{ __('E-mail*') }}</label>
                                    <input id="email" type="text" class="@error('email') is-invalid @enderror" name="user_email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="telephone">{{ __('Phone Number*') }}</label>
                                    <input id="telephone" type="tel" class="@error('telephone') is-invalid @enderror" name="telephone" required autocomplete="telephone">
                                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ">
                            <label for="password">{{ __('Password*') }}</label>
                            <input id="password" name="password" type="password" class="@error('password') is-invalid @enderror" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group ">           
                            <label for="password-confirm">{{ __('Confirm Password*') }}</label>
                            <input id="password-confirm" name="password_confirmation" type="password"  required autocomplete="new-password">
                            </div>
                            
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div> <input type="button" name="next" class="next action-button" value="Next" id="nextUser"/> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    {{-- END USER --}}
                    {{-- FINISH --}}
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">{{__('Finish:')}}</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">{{__('Step 3 - 3')}}</h2>
                                </div>
                            </div> <br><br>
                            <h2 class="purple-text text-center"><strong>{{__('SUCCESS !')}}</strong></h2> <br>
                            <div class="row justify-content-center">
                            <div class="col-3"> <img src="{{asset('images/check-mark.png')}}" class="fit-image"> </div>
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">{{__('You Have Successfully Signed Up. We\'ll Send An Email In 5 Minutes. Please Open It Up To Validate Your Account.')}}</h5>
                                </div>
                            </div>
                            <a type="button" class="next action-button" href="{{route('home')}}">{{__('Back to Homepage')}}</a>
                        </div>
                    </fieldset>
                    {{-- ENDFINISH --}}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot')
    <!-- JS -->
    <script src="{{ asset('js/jquery.steps.js') }}"></script>
@endsection