@extends("app")

@section("content")

<div class="card my-5">
    <div class="card-header bg-dark text-white">Seller Permissions List</div>    
    <div class="card-body">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSeller">
      <i class='fa fa-plus'></i> Add New Seller Permissions
      </button>
      <div class="table-responsive mt-3">
          <table class="table table-bordered">
              <thead class="bg-dark text-white">
                  <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Seller</th>
                        <th scope="col">Permission</th>
                        <th scope="col">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($sellerPermissions as $sellerPermission)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$sellerPermission->seller_id}}</td>
                      <td>{{$sellerPermission->permission_id}}</td>
                      <td>
                          <a href="#edit{{$sellerPermission->id}}" data-bs-toggle="modal" class="btn btn-sm btn-warning"><i class='fa fa-edit'></i> Edit</a> 
                          <a href="#delete{{$sellerPermission->id}}" data-bs-toggle="modal" class="btn btn-sm btn-danger"><i class='fa fa-trash'></i> Hapus</a>
    
                          <!-- Edit Modal -->
                          <div class="modal fade" id="edit{{$sellerPermission->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Edit Seller Permission</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {!! Form::model($sellerPermission, [ 'method' => 'patch','route' => ['seller-permission.update', $sellerPermission->id] ]) !!}
                                    @csrf
                                    <div class="mb-3">
                                        {!! Form::label('seller', 'seller') !!}
                                        {!! Form::select('seller_id', $sellers, $sellerPermission->seller_id, ['class' => 'form-control', 'required']) !!}
                                    </div>
                                    <div class="mb-3">
                                        {!! Form::label('permission', 'permission') !!}
                                        {!! Form::select('permission_id', $permissions, $sellerPermission->permission_id, ['class' => 'form-control', 'required']) !!}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                    {{Form::button('<i class="fa fa-check-square-o"></i> Update', ['class' => 'btn btn-success', 'type' => 'submit'])}}
                                    {!! Form::close() !!}
                                </div>
                              </div>
                          </div>
                          </div>
                          
                          <!-- Delete Modal -->
                          <div class="modal fade" id="delete{{$sellerPermission->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                              <div class="modal-header">
                              <h5 class="modal-title" id="myModalLabel">Delete Confirmation</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              {!! Form::model($sellerPermission, [ 'method' => 'delete','route' => ['seller-permission.delete', $sellerPermission->id] ]) !!}
                              @csrf
                              <div class="alert alert-warning alert-dismissible fade show" role="alert">  
                                <strong>Are you sure to delete this seller permission?</strong><br><br>
                                <i class="fa fa-info-circle"></i> This action cannot be undone.
                              </div>
                              <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                              {{Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-danger', 'type' => 'submit'])}}
                              {!! Form::close() !!}
                              </div>
                              </div>
                          </div>
                          </div> 
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {{ $sellerPermissions->links('pagination::bootstrap-5') }}
          <!-- Add Modal -->
          <div class="modal fade" id="addSeller" tabindex="-1" aria-labelledby="addSeller" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="addSeller">Add New Seller Permission</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                {!! Form::open(['url' => 'seller-permission/create']) !!}
                @csrf
                <div class="mb-3">
                    {!! Form::label('seller', 'Seller') !!}
                    {!! Form::select('seller', $sellers, '', $attributes = $errors->has('seller') ?
                    ['class' => 'form-control is-invalid', 'placeholder' => '- Select Seller -']  :
                    ['class' => 'form-control', 'placeholder' => '- Select Seller -']) !!}
                    @error('seller')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    {!! Form::label('permission', 'Permission') !!}
                    {!! Form::select('permission', $permissions, '', $attributes = $errors->has('permission') ?
                    ['class' => 'form-control is-invalid', 'placeholder' => '- Select Permission -']  :
                    ['class' => 'form-control', 'placeholder' => '- Select Permission -']) !!}
                    @error('permission')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Data</button>
                {!! Form::close() !!}
              </div>
              </div>
          </div>
          </div>
      </div>
    </div>
</div>

@endsection