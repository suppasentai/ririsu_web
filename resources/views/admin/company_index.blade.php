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
          <div class="col-md-12">
            <div class="card card-default">
                <div class="card-body">
                    <div class="row news-post large-post mb-0">
                        <table class="table table-hover" id="articles">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                    <th>Verify</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>{{ $company->id }}</td>
                                        <td>{{ $company->title }}</td>
                                        <td>{{ Carbon\Carbon::parse($company->created_at)->diffForHumans() }}</td>
                                        <td>
                                        <a class="read-more" href="single-post.html">{{__('Edit ')}}<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                          <a class="read-more bg-danger" href="single-post.html">{{__('Delete ')}}<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                        </td>
                                        @can('admin')
                                            <td>
                                                @if($company->verified == true)
                                                    <button id="{{ $company->id }}" class="btn btn-success btn-sm" onclick="changeStatus({{ $company->id }})"><i class="fa fa-check-circle" aria-hidden="true"></i></button>
                                                @else
                                                    <button id="{{ $company->id }}" class="btn btn-danger btn-sm" onclick="changeStatus({{ $company->id }})"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                                                @endif
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $companies->links() }}
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
                url: 'companiesChangeStatus/'+id,
                beforeSend: function () {
                    $("#"+id).removeClass("btn-danger");
                    $("#"+id).removeClass("btn-success");
                    $("#"+id).addClass("btn-default");
                    $("#"+id).html('<i class="fa fa-refresh fa-spin"></i>');
                },
                success: function(result){
                    if(result == true){
                        $("#"+id).removeClass("btn-danger");
                        $("#"+id).addClass("btn-success");
                        $("#"+id).html('<i class="fa fa-check-circle" aria-hidden="true"></i>');
                    }else if(result == false){
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