@include('BackEnd.header')

@include('BackEnd.navbar')

@include('BackEnd.sidebar')

  <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
          </div>
          <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-hover table-striped">
              <thead class="thead-dark">
                  <tr>
                      <th>#</th>
                      <th>nama</th>
                      <th>description</th>
                      <th>favorite</th>
                      <th>order</th>
                      <th>price</th>
                      <th>created date</th>
                      <th class="text-center width-100">Action</th>                                                										 
                  </tr>
              </thead>
                <tbody>                                                              
                </tbody>
                    @foreach ($foods as $food)
                      <tr>
                        <td>{{$food->iteration }}</td>
                        <td>{{$food->name}}</td>
                        <td>{{$food->description}}</td>
                        <td>{{$food->price }}</td>
                        <td>{{$food->created_at }}</td>
                        <td>
                          <!-- Edit category data -->
                          <a href="#" class="btn" style="color : white; background : #658978;" data-bs-toggle="modal"
                            data-bs-target="#editCategory{{ $food->id }}">
                            Detail
                          </a>
                          <a href="#" class="btn" style="color : white; background : #658978;" data-bs-toggle="modal"
                            data-bs-target="#editCategory{{ $food->id }}">
                            Edit
                          </a>
                          <!-- Delete category data -->
                          <a href="/category/delete/{{ $food->id }}" onclick="return confirm('ingin hapus data?')"
                            class="btn btn-success">
                            Delete
                          </a>
                        </td>
                      </tr>
                    @endforeach
                    <tr>
                      <td>Trident</td>
                      <td>Internet
                        Explorer 5.0
                      </td>
                      <td>Win 95+</td>
                      <td>5</td>
                      <td>C</td>
                      <td>Internet
                        Explorer 4.0
                      </td>
                      <td>Win 95+</td>
                      <td class="text-center">
                          <a href="" class="btn btn-default btn-rounded"><i class="fa fa-edit"></i></a>
                          <a href="" class="btn btn-default btn-rounded" onclick="return confirm('Are you sure? You will not be able to recover this.')"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>Trident</td>
                      <td>Internet
                        Explorer 5.5
                      </td>
                      <td>Win 95+</td>
                      <td>5.5</td>
                      <td>A</td>
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


@include('BackEnd.footer')