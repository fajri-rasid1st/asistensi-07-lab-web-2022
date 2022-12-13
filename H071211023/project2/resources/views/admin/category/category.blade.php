@include('BackEnd.header')

@include('BackEnd.navbar')

@include('BackEnd.sidebar')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="card">
      <div class="card-body">
          <h4 class="card-title">Listed Categories</h4>
        
          <div class="table-responsive m-t-40">
              <table id="myTable" class="table table-bordered table-hover table-striped">
                  <thead class="thead-dark">
                      <tr>
                          <th>#</th>
                          <th>nama makanan</th>
                          <th>jumlah makanan</th>
                          <th>created date</th>
                          <th>Author</th>
                          <th>Action</th>                                                										 
                      </tr>
                  </thead>
                  <tbody>                                                              
                  </tbody>
              </table>
          </div>
      </div>
                          
    <!-- /.content-header -->
  </div>


@include('BackEnd.footer')