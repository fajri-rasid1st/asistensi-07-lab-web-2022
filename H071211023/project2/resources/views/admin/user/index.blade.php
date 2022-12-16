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
      <h4 class="card-title">Listed User</h4>
    </div>
    <a href="/dashboard/categories/create" class="btn btn-primary mb-3"><i class="fas fa-plus "></i> Create New Category</a>
    <div class="table-responsive m-t-40">
      <table id="myTable" class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>nama</th>
                <th>email</th>
                <th>joined date</th>
                {{-- <th>jumlah orderan</th> --}}
                <th>Action</th>                                                										 
            </tr>
        </thead>
        <tbody> 
          @foreach ($users as $user)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            
              <!-- Edit category data -->
              @if($user->is_admin=="0")
              <td>
              <a href="" class="btn btn-default btn-rounded"><i class="fa fa-list"></i></a>
              <a href="" class="btn btn-default btn-rounded"><i class="fa fa-edit"></i></a>
                    <form action="/dashboard/users/{{$user->id}}" method="POST" class="d-inline">
                      @method('delete')
                      @csrf
                    <button class="btn btn-default btn-rounded" onclick="return confirm('Are you sure? You will not be able to recover this.')"><i class="fa fa-trash"></i></button>
                    </form>
              </td>
              @else
              <td><a>Not Allowed</a></td>
              @endif

            
          </tr>
              
          @endforeach                                                             
        </tbody>
      </table>
    </div>
      <div class="pagination justify-content-center">
        {{$users->links()}}
      </div>
  </div>

</div>

@endsection