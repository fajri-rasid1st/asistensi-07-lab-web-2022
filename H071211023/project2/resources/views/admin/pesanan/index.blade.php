@extends('BackEnd.master')
@section('title')
    category page
@endsection

@section('content')

<div class="card">
  <div class="card-body">
    <div class="card-header">
      <h4 class="card-title">Listed pesanan</h4>
    </div>
      <div class="table-responsive m-t-40">
        <table id="myTable" class="table table-bordered table-hover table-striped">
          <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>menu makanan</th>
                <th>nama pembeli</th>
                <th>alamat pemesan</th>
                <th>harga total</th>
                <th>note</th>
                <th>bukti pembayaran</th>
                <th>Action</th>                                                										 
            </tr>
          </thead>
          <tbody>                                                              
          </tbody>
          <tr>
            <td>Trident</td>
            <td>Internet
              Explorer 4.0
            </td>
            <td>Win 95+</td>
            <td> 4</td>
            <td>X</td>
            <td>Internet
              Explorer 4.0
            </td>
            <td>Win 95+</td>
            <td class="text-center">
                <a href="" class="btn btn-default btn-rounded"><i class="fa fa-edit"></i></a>
                <a href="" class="btn btn-default btn-rounded" onclick="return confirm('Are you sure? You will not be able to recover this.')"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div> 
</div>              


@endsection