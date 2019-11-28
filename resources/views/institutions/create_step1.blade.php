{{-- @extends('layouts.app')

@section('title', 'Institution Form')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/processSteps.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.step.css') }}">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css" />
    <script src="{{ asset('js/jquery.steps.js') }}"></script>
    <script src="{{ asset('js/jquery.steps.min.js') }}"></script>
@endsection

@section('content')


    






    <section id="content-section">
        <div class="container col-lg-8">
            <div class="text-center title-section">
                <h1>{{__("Application for Institution Registration")}}</h1>
            </div>
            <div class="wizard pt-0">
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs mt-0" role="tablist">
                        <li role="presentation" class="nav-item">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1" class="nav-link active">
                                <span class="round-tab">
                                    <i class="fa fa-building"></i>
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="nav-item">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2" class="nav-link disabled">
                                <span class="round-tab">
                                    <i class="fa fa-user"></i>
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="nav-item">
                            <a href="#step5" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3" class="nav-link disabled">
                                <span class="round-tab">
                                    <i class="fa fa-check"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container col-lg-8">
                <form method="POST" action="{{ route('post_create_step1') }}">
                    <p>Used by 37.71% of listed companies in Middle Earth, so far more than 33,000 companies have distributed press releases and news releases on Ririsu.
                            Click here for the features of <a href='/about'>Ririsu</a>, which has the largest share of press releases. Click here for pricing plans.
                            If you have any questions regarding use or application, please <a href=''>contact us</a>.</p>
                @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="title">{{ __('Corporate name*') }}</label>
                        <input id="title" type="text" name="title" class="@error('title') is-invalid @enderror" value="{{ old('title') }}" required autocomplete="title">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="representative_name">{{ __('Representative Name*') }}</label>
                        <input id="representative_name" name="representative_name" class="@error('representative_name') is-invalid @enderror" value="{{ old('representative_name') }}" type="text">
                        @error('representative_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="identification_code">{{ __('Identification Code*') }}</label>
                        <input id="identification_code" name="identification_code" class="@error('identification_code') is-invalid @enderror" value="{{ old('identification_code') }}" type="text" required>
                        @error('identification_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <label for="incorp_date">{{ __('Incoporation Date') }}</label>
                        <input id="incorp_date" class="@error('incorp_date') is-invalid @enderror" name="incorp_date" value="{{ old('incorp_date') }}">
                        @error('incorp_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <script>
                            $('#incorp_date').datepicker();
                        </script>
                    </div>
                    <div class="col-md-6">
                        <label for="location">{{ __('Location*') }}</label>
                        <input id="location" name="location" class="@error('location') is-invalid @enderror" type="text" value="{{ old('location') }}" required>
                        @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="tel">{{ __('Telephone') }}</label>
                        <input id="tel" type="tel" class="@error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required>
                        @error('tel')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="email">{{ __('E-mail*') }}</label>
                        <input id="email" type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="url">{{ __('Corporate URL') }}</label>
                        <input id="url" class="@error('url') is-invalid @enderror" name="url" type="text">
                        @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="employees_number">{{ __('Employees Number') }}</label>
                        <input id="employees_number" class="@error('employees_number') is-invalid @enderror" name="employees_number" type="number" min="1">
                        @error('employees_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="capital_stock">{{ __('Capital Stock') }} $</label>
                        <input id="capital_stock" class="@error('capital_stock') is-invalid @enderror" type="number" min="1" step="1"  name="capital_stock">
                        @error('capital_stock')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row justify-content-md-center">
                    <div class="col">
                        <button type="submit" id="submit-register2" class="mx-auto">
                                <i class="fa fa-building"></i>{{ __('Next') }}
                        </button>
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
            </form>
            
            </div>
        </div>
    </section>
@endsection

@section('foot')
@endsection --}}

@extends('layouts.app')

@section('title', 'Institution Form')

@section('head')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css" />

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/style-wizard.css') }}">
@endsection

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2 id="heading">Sign Up Your User Account</h2>
                <p>Fill all form field to go to next step</p>
                <form id="msform">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active" id="account"><strong>Account</strong></li>
                        <li id="personal"><strong>Personal</strong></li>
                        <li id="payment"><strong>Image</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
                    </ul>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br> <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Account Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 1 - 4</h2>
                                </div>
                            </div> <label class="fieldlabels">Email: *</label> <input type="email" name="email" placeholder="Email Id" /> <label class="fieldlabels">Username: *</label> <input type="text" name="uname" placeholder="UserName" /> <label class="fieldlabels">Password: *</label> <input type="password" name="pwd" placeholder="Password" /> <label class="fieldlabels">Confirm Password: *</label> <input type="password" name="cpwd" placeholder="Confirm Password" />
                        </div> <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Personal Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 2 - 4</h2>
                                </div>
                            </div> <label class="fieldlabels">First Name: *</label> <input type="text" name="fname" placeholder="First Name" /> <label class="fieldlabels">Last Name: *</label> <input type="text" name="lname" placeholder="Last Name" /> <label class="fieldlabels">Contact No.: *</label> <input type="text" name="phno" placeholder="Contact No." /> <label class="fieldlabels">Alternate Contact No.: *</label> <input type="text" name="phno_2" placeholder="Alternate Contact No." />
                        </div> <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Image Upload:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 3 - 4</h2>
                                </div>
                            </div> <label class="fieldlabels">Upload Your Photo:</label> <input type="file" name="pic" accept="image/*"> <label class="fieldlabels">Upload Signature Photo:</label> <input type="file" name="pic" accept="image/*">
                        </div> <input type="button" name="next" class="next action-button" value="Submit" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 4 - 4</h2>
                                </div>
                            </div> <br><br>
                            <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                            <div class="row justify-content-center">
                            <div class="col-3"> <img src="{{asset('images/check-mark.png')}}" class="fit-image"> </div>
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                </div>
                            </div>
                        </div>
                    </fieldset>
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