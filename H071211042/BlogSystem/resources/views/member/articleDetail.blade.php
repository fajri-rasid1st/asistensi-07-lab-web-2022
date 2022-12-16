@extends('layout.admin')
@section('content')
<div class="content-wrapper" style="min-height: 1604.44px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Article Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/articles">Articles</a></li>
              <li class="breadcrumb-item active">Article Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{$data1 -> title}}</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Favorite</span>
                      <span class="info-box-number text-center text-muted mb-0">0</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Comment</span>
                      <span class="info-box-number text-center text-muted mb-0">0</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Read</span>
                      <span class="info-box-number text-center text-muted mb-0">0</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                {{$data1->body}}
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Description</h3>
              <p class="text-muted">{{$data1->description}}</p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Author
                  <b class="d-block">{{$data2 -> username}}</b>
                </p>
                <p class="text-sm">Category
                  @foreach ($data3 as $item)
                  <b class="d-block">{{$item -> name}}</b>
                  @endforeach
                </p>
                <p class="text-sm">Tags
                  @foreach ($data5 as $itemss)
                    @foreach ($itemss->tags as $tag)
                    <b class="d-block">{{$tag -> name}}</b>
                    @endforeach
                  @endforeach
                </p>
              </div>

              <h5 class="mt-5 text-muted">Author Details</h5>
              <ul class="list-unstyled">
                <li>
                  <p  class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> {{$data2 -> email}} </p>
                </li>
              </ul>
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-warning">Edit Article</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection