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
          <div class="col-md-12 order-md-1">
            {!! Form::open(['method' => 'POST', 'route'  => 'store_articles', 'role' =>  'form',
              'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'id' => 'article_create_form']) !!}

              <div class="form-group">
                {!! Form::label('image', __('Image')) !!}
                {!! Form::file('image', ['id' => 'image', 'class'=> 'form-control', 'accept'=>'image/*'])!!}
              </div>
              

              <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('title', __('Title'), ['class' => 'control-label']) !!}  

                  <div>
                    {!! Form::text('title', old('title'), ['id'=> 'title', 'class' => 'form-control', 'required', 'autofocus']) !!}

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
                  

                <div class="col-md-3 mb-3 form-group {{ $errors->has('category_ref') ? ' has-error' : '' }}">
                  
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
                {!! Form::button('<span class="fa fa-plus" aria-hidden="true"></span> Create', 
                ['type'=> 'submit', 'class' =>  'btn btn-primary']) !!}
              </div>
            {!! Form::close() !!}
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