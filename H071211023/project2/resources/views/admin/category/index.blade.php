@extends('BackEnd.master')
@section('title')
    category page
@endsection

@section('content')

<div class="card">
  <div class="card-body">
    @if (session()->has('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    <div class="table-responsive m-t-40">
      <a href="/dashboard/categories/create" class="btn btn-primary mb-3"><i class="fas fa-plus "></i> Create New Category</a>
      <table id="myTable" class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>nama makanan</th>
                {{-- <th>jumlah makanan</th> --}}
                <th>created date</th>
                {{-- <th>Author</th> --}}
                <th>Action</th>                                                										 
            </tr>
        </thead>
          <tbody>                                                              
          </tbody>
              @foreach ($categories as $category)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$category->name}}</td>
                  <td>{{$category->created_at}}</td>
                  <td>
                    <!-- Edit category data -->
                    <a href="" class="btn btn-default btn-rounded"><i class="fa fa-list"></i></a>
                    <a href="/dashboard/categories/{{$category->id}}/edit" class="btn btn-default btn-rounded"><i class="fa fa-edit"></i></a>
                    <form action="/dashboard/categories/{{$category->id}}" method="POST" class="d-inline">
                      @method('delete')
                      @csrf
                    <button class="btn btn-default btn-rounded" onclick="return confirm('Are you sure? You will not be able to recover this.')"><i class="fa fa-trash"></i></button>

                    </form>
                  </td>
                </tr>
              @endforeach
      </table>
    </div>
    <div class="pagination justify-content-center">
      {{$categories->links()}}
    </div>
  </div>
  
</div>


@endsection