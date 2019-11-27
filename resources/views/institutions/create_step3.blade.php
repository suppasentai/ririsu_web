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
                            <a href="#step5" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3" class="nav-link active">
                                <span class="round-tab">
                                    <i class="fa fa-check"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection