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
        <h4 class="card-title">Tag</h4>
      </div>
          <a href="/dashboard/tags/create" class="btn btn-primary mb-3"><i class="fas fa-plus "></i> Create New Tag</a>
      <div class="table-responsive m-t-40">
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
            @foreach ($tags as $tag)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$tag->name}}</td>
                  <td>{{$tag->created_at}}</td>
                  <td>
                    <!-- Edit tag data -->
                    <a href="" class="btn btn-default btn-rounded"><i class="fa fa-list"></i></a>
                    <a href="/dashboard/tags/{{$tag->id}}/edit" class="btn btn-default btn-rounded"><i class="fa fa-edit"></i></a>
                    <form action="/dashboard/tags/{{$tag->id}}" method="POST" class="d-inline">
                      @method('delete')
                      @csrf
                    <button class="btn btn-default btn-rounded" onclick="return confirm('Are you sure? You will not be able to recover this.')"><i class="fa fa-trash"></i></button>

                    </form>
                  </td>
                </tr>
              @endforeach                                                            
          </tbody>
        </table>
      </div>
    <div class="pagination justify-content-center">
      {{$tags->links()}}
    </div>
    </div>
  </div>


@endsection