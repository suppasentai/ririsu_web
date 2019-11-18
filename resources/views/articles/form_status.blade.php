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
                                            @if($article->status == App\Enums\ReleaseStatus::Released)
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
                    if(result == {{ App\Enums\ReleaseStatus::Released }}){
                        $("#"+id).removeClass("btn-danger");
                        $("#"+id).addClass("btn-success");
                        $("#"+id).html('<i class="fa fa-check-circle" aria-hidden="true"></i>');
                    }else if(result == {{ App\Enums\ReleaseStatus::Pending }}){
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