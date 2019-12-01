@extends('layouts.userapp')

@section('content')
  <section id="content-section">
    <div class="container">
        @include('alerts.success')
        @include('alerts.warning')
        <div class="text-center title-section">
          <h1>{{__("Tags")}}</h1>
        </div>
        <div class="row">
          <div class="col-md-8">
            <div class="card card-default">

                <div class="card-body">
                    <div class="row news-post large-post mb-0">
                        <table class="table table-hover" id="articles">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->title }}</td>
                                        <td>
                                          <a class="read-more" href="single-post.html">Edit <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                          <a class="read-more bg-danger" href="single-post.html">Delete <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $tags->links() }}
                </div>
            </div>
          </div>
          <div class="col-lg-4 sidebar-sticky">
                    
              <!-- Sidebar -->
              <div class="sidebar theiaStickySidebar">
                <form class="form-horizontal" role="form" method="POST" action="{{  route('tags.store') }}">
                  {{ csrf_field() }}
    
                  <div class="form-group">
                      <label for="title">{{__('Add Tag')}}</label>
                      <input id="title" type="text" class="form-control" name="title">
                  </div>
    
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary">
                          <span class="fa fa-plus" aria-hidden="true"></span> Create
                      </button>
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>
  </section>
@endsection