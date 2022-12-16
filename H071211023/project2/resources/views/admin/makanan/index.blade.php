@extends('BackEnd.master')
@section('title')
    food page
@endsection

@section('content')

<div class="card">
  <div class="card-body">
    
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    @if(session()->has('success'))
      <div class="alert alert-success col-lg-10" role="alert">
      {{ session('success') }}
      </div>
    @endif
    
    <div class="table-responsive m-t-40">
      <a href="/dashboard/foods/create" class="btn btn-primary mb-3"><i class="fas fa-plus "></i> Create New Food</a>
      <table id="myTable" class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>nama</th>
                {{-- <th>favorite</th>
                <th>order</th> --}}
                <th>price</th>
                <th>description</th>
                <th>created date</th>
                <th class="text-center width-100">Action</th>                                                										 
            </tr>
        </thead>
          <tbody>                                                              
          </tbody>
              @foreach ($foods as $food)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$food->name}}</td>
                  {{-- <td>{{$food->favorite}}</td>
                  <td>{{$food->order}}</td> --}}
                  <td>{{$food->price}}</td>
                  <td>{{$food->description}}</td>
                  <td>{{$food->created_at }}</td>
                  <td>
                    <!-- Edit category data -->
                    <a href="" class="btn btn-default btn-rounded"><i class="fa fa-list"></i></a>
                    <a href="" class="btn btn-default btn-rounded"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-default btn-rounded" onclick="return confirm('Are you sure? You will not be able to recover this.')"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              @endforeach
      </table>
    </div>
      <div class="pagination justify-content-center">
        {{$foods->links()}}
      </div>
  </div>
</div>

@endsection