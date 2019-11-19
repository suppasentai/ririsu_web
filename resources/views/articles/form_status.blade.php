@extends('layouts.userapp')

@section('content')
  <section id="content-section">
    <div class="container">
        @include('alerts.success')
        @include('alerts.warning')
        <div class="text-center title-section">
          <h1>{{__("Create new article")}}</h1>
        </div>
        <div class="row">
          <div class="col-md-8 order-md-1">
            <h4 class="mb-3">{{__('Create Article')}}</h4>
            <div class="card card-default">

                <div class="card-body">
                    <div class="row">
                        <table class="table table-hover" id="articles">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>User</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                    <th>Publish</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <tr>
                                        <td>{{ $article->id }}</td>
                                        <td>{{ $article->title }}</td>
                                        <td>{{ $article->user->first_name }}</td>
                                        <td>{{ Carbon\Carbon::parse($article->created_at)->diffForHumans() }}</td>
                                        <td>
                                          <a class="read-more" href="single-post.html">Edit <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                          <a class="read-more bg-danger" href="single-post.html">Delete <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                        </td>
                                        <td>
                                            @if($article->status == App\Enums\ReleaseStatus::Published)
                                                <button id="{{ $article->id }}" class="btn btn-success btn-sm" onclick="changeStatus({{ $article->id }})"><i class="fa fa-check-circle" aria-hidden="true"></i></button>
                                            @else
                                                <button id="{{ $article->id }}" class="btn btn-danger btn-sm" onclick="changeStatus({{ $article->id }})"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $articles->links() }}
                </div>
            </div>
          </div>
        </div>
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
                url: 'articlesChangeStatus/'+id,
                beforeSend: function () {
                    console.log("bleehe")
                    $("#"+id).removeClass("btn-danger");
                    $("#"+id).removeClass("btn-success");
                    $("#"+id).addClass("btn-default");
                    $("#"+id).html('<i class="fa fa-refresh fa-spin"></i>');
                },
                success: function(result){
                    if(result == {{ App\Enums\ReleaseStatus::Published }}){
                        $("#"+id).removeClass("btn-danger");
                        $("#"+id).addClass("btn-success");
                        $("#"+id).html('<i class="fa fa-check-circle" aria-hidden="true"></i>');
                    }else if(result == {{ App\Enums\ReleaseStatus::Editing }}){
                        $("#"+id).removeClass("btn-success");
                        $("#"+id).addClass("btn-danger");
                        $("#"+id).html('<i class="fa fa-times-circle" aria-hidden="true"></i>');
                    }else{
                        console.log(result)
                    }
                }
            });
        }
    </script>
@endsection