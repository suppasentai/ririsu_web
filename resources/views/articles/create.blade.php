@extends('layouts.userapp')

@section('head')
    {{-- Summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
@endsection

@section('content')
    <div class="container">
        @include('alerts.success')
        @include('alerts.warning')
        <div class="text-center title-section">
          <h1>{{__("Create new article")}}</h1>
        </div>
  
        <div class="row">
            {{-- Right Panel --}}
          <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Your cart</span>
              <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">Product name</h6>
                  <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">$12</span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">Second product</h6>
                  <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">$8</span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">Third item</h6>
                  <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">$5</span>
              </li>
              <li class="list-group-item d-flex justify-content-between bg-light">
                <div class="text-success">
                  <h6 class="my-0">Promo code</h6>
                  <small>EXAMPLECODE</small>
                </div>
                <span class="text-success">-$5</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Total (USD)</span>
                <strong>$20</strong>
              </li>
            </ul>
  
            <form class="card p-2">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Promo code">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-secondary">Redeem</button>
                </div>
              </div>
            </form>
          </div>
          {{-- End Right Panel --}}
          <div class="col-md-8 order-md-1">
            {{-- <form class="form-horizontal" role="form" method="POST" action="{{  route('store_articles') }}" enctype="multipart/form-data"> --}}
            {!! Form::open(['method' => 'POST', 'route'  => 'store_articles', 'role' =>  'form',
              'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'id' => 'article_create_form']) !!}
              {{-- {{ csrf_field() }} --}}

              <div class="form-group">
                {!! Form::label('image', __('Image')) !!}
                  {{-- <label for="image">{{__('Image')}}</label> --}}
                {!! Form::file('image', ['id' => 'image', 'class'=> 'form-control', 'accept'=>'image/*'])!!}
                  {{-- <input id="image" type="file" class="form-control" name="image" accept="image/*"> --}}
              </div>
              <div class="form-group">
                {!! Form::label('tag', __('Tag')) !!}
                {{-- <label for="tag">{{__('Tag')}}</label> --}}
                {!! Form::select('tag[]', $tags, old('tag'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-tag' ]) !!}
              </div>

              <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('title', __('Title'), ['class' => 'control-label']) !!}  
                {{-- <label for="title" class="control-label">Title</label> --}}

                  <div>
                    {!! Form::text('title', old('title'), ['id'=> 'title', 'class' => 'form-control', 'required', 'autofocus']) !!}
                      {{-- <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus> --}}

                      @if ($errors->has('title'))
                          <span class="help-block">
                          <strong>{{ $errors->first('title') }}</strong>
                      </span>
                      @endif
                  </div>
              </div>

              <div id="url_videoDiv" style="display: none;" class="form-group{{ $errors->has('url_video') ? ' has-error' : '' }}">
                  {{-- <label for="url_video" class="control-label">URL Video</label> --}}
                  {!! Form::label('url_video', __('URL Video'), ['class' => 'control-label']) !!} 
                  <div>
                      {!! Form::text('url_video', old('url_video'), ['id'=> 'url_video', 'class' => 'form-control']) !!}
                      {{-- <input id="url_video" type="text" class="form-control" name="url_video" value="{{ old('url_video') }}"> --}}

                      @if ($errors->has('url_video'))
                          <span class="help-block">
                          <strong>{{ $errors->first('url_video') }}</strong>
                      </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                  {{-- <label for="description" class="control-label">Description</label> --}}
                  {!! Form::label('descripttion', __('Descripttion'), ['class' => 'control-label']) !!} 
                  <div>
                      <textarea id="description" type="text" class="form-control" name="description">
                          {{ old('description') }}
                      </textarea>

                      @if ($errors->has('description'))
                          <span class="help-block">
                          <strong>{{ $errors->first('description') }}</strong>
                      </span>
                      @endif
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-4 mb-3 form-group {{ $errors->has('grade_ref') ? ' has-error' : '' }}">
                    {!! Form::label('grade_ref', __('Grade'), ['class' => 'control-label']) !!}   
                    {{-- <label for="grade_ref" class="control-label">{{__("Grade")}}</label> --}}
                    <select class="form-control" id="grade_ref" name="grade_ref">
                          @foreach( $grades as $grade )
                              @if($grade->title == Auth::user()->grade)
                                  <option value="{{ $grade->title }}" selected>{{ $grade->title }}</option>
                              @else
                                  <option value="{{ $grade->title }}">{{ $grade->title }}</option>
                              @endif
                          @endforeach
                      </select>

                      @if ($errors->has('grade_ref'))
                          <span class="help-block">
                          <strong>{{ $errors->first('grade_ref') }}</strong>
                      </span>
                      @endif
                  </div>

                  <div class="col-md-3 mb-3 form-group {{ $errors->has('category_ref') ? ' has-error' : '' }}">
                    {!! Form::label('category_ref', __('Category'), ['class' => 'control-label']) !!}   
                    {{-- <label for="category_ref" class="control-label">Category</label> --}}
                      <select class="form-control" id="category_ref" name="category_ref">
                          @foreach( $categories as $category )
                              @if($category->title == old('category_ref'))
                                  <option value="{{ $category->title }}" selected>{{ $category->title }}</option>
                              @else
                                  <option value="{{ $category->title }}">{{ $category->title }}</option>
                              @endif
                          @endforeach
                      </select>

                      @if ($errors->has('category_ref'))
                          <span class="help-block">
                          <strong>{{ $errors->first('category_ref') }}</strong>
                      </span>
                      @endif
                  </div>
              </div>

              <div class="form-group">
                  <div class="well well-sm">
                      <div class="col-md-2">
                          <i class="fa fa-warning fa-3x" aria-hidden="true"></i>
                      </div>
                      <div class="col-md-10">
                          {{__('The articles will not be displayed until it is published by an editor')}}
                      </div>
                      <div class="clearfix"></div>
                  </div>
              </div>

              <div class="form-group">
                {!! Form::button('<span class="fa fa-plus" aria-hidden="true"></span> Create', ['type'=> 'submit', 'class' =>  'btn btn-primary']) !!}
                  {{-- <button type="submit" class="btn btn-primary">
                      <span class="fa fa-plus" aria-hidden="true"></span> Create
                  </button> --}}
              </div>
            {!! Form::close() !!}
            {{-- </form> --}}
          </div>
        </div>
      </div>
@endsection
@section('foot')
<script>
  $(".select2").select2({
    tags: true,
    tokenSeparators: [',', ' '],
    createTag: function (params) {
    var term = $.trim(params.term);
      console.log(term)
    if (term === '') {
      return null;
    }

    return {
      id: term+"@/new",
      text: term,
    }
  }
  });
</script>

<script>
    $('#description').summernote({
    height: ($(window).height() - 300),
    minHeight: null,             // set minimum height of editor
    maxHeight: null,             // set maximum height of editor
    focus: true                  // set focus to editable area after initializing summernote
});
  </script>
@endsection