@extends('layouts.app')

@section('title', 'Institution Form')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/processSteps.css') }}">
@endsection

@section('content')
    <section id="content-section">
        <div class="container col-lg-10">
            <div class="text-center title-section">
                <h1>{{__("Institution Register")}}</h1>
                
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
            <form id="register-form" method="POST" action="{{ route('post_create_step1') }}">
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
                    <div class="col-md-6">
                        <label for="identification_code">{{ __('Identification Code*') }}</label>
                        <input id="identification_code" name="identification_code" class="@error('identification_code') is-invalid @enderror" value="{{ old('identification_code') }}" type="text" required>
                        @error('identification_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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
                    <div class="col-md-6">
                        <label for="tel">{{ __('Telephone') }}</label>
                        <input id="tel" type="tel" class="@error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required>
                        @error('tel')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="incorp_date">{{ __('Incoporation Date') }}</label>
                        <input id="incorp_date" class="@error('incorp_date') is-invalid @enderror" type="text" name="incorp_date" value="{{ old('incorp_date') }}">
                        @error('incorp_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="capital_stock">{{ __('Capital Stock') }} $</label>
                        <input id="capital_stock" class="@error('capital_stock') is-invalid @enderror" type="number" min="1" step="100"  name="capital_stock">
                        @error('capital_stock')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="employees_number">{{ __('Employees Number') }}</label>
                        <input id="employees_number" class="@error('employees_number') is-invalid @enderror" name="employees_number" type="number" min="1">
                        @error('employees_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="email">{{ __('E-mail*') }}</label>
                        <input id="email" type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="url">{{ __('Corporate URL') }}</label>
                        <input id="url" class="@error('url') is-invalid @enderror" name="url" type="text">
                        @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6 pt-4">
                        <button type="submit" id="submit-register2" class="mx-auto">
                                <i class="fa fa-building"></i>{{ __('Sign Up') }}
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
    </section>
@endsection