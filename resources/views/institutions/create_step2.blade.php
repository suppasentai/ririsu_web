@extends('layouts.app')

@section('title', 'Institution Form')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/processSteps.css') }}">
@endsection

@section('content')
    <section id="content-section">
        <div class="container col-lg-10">
            <div class="text-center title-section">
                <h1>{{__("Create new article")}}</h1>
            </div>
            <div class="wizard pt-0">
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="nav-item">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1" class="nav-link active">
                                <span class="round-tab">
                                    <i class="fa fa-building"></i>
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="nav-item">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2" class="nav-link active">
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
            <form id="register-form" method="POST" action="{{ route('post_create_step2') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="email">{{ __('E-mail*') }}</label>
                        <input id="email" type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="name">{{ __('Username*') }}</label>
                        <input id="name" name="name" type="text">
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
                <div class="form-group">
                <button type="submit" id="submit-register2">
                    <i class="fa fa-paper-plane"></i> {{ __('Sign Up') }}
                </button>
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