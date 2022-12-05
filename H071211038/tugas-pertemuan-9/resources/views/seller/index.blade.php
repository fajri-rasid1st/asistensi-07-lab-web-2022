@extends("app")

@section("content")

<div class="card my-5" id="seller">
    <div class="card-header bg-dark text-white">Sellers List</div>    
    <div class="card-body">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSeller">
      <i class='fa fa-plus'></i> Add New Seller
      </button>
      <div class="table-responsive mt-3">
          <table class="table table-bordered">
              <thead class="bg-dark text-white">
                  <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Gender</th>
                      <th scope="col">No. HP</th>
                      <th scope="col">Status</th>
                      <th scope="col">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $num=1;?>
                  @foreach($sellers as $seller)
                  <tr>
                      <td><?php echo $num++; ?></td>
                      <td>{{$seller->name}}</td>
                      <td>{{$seller->address}}</td>
                      <td>
                        @if($seller->gender == 'M')
                            {{'Male'}}
                        @else
                            {{'Female'}}
                        @endif
                        </td>
                      <td>{{$seller->no_hp}}</td>
                      <td>{{$seller->status}}</td>
                      <td>
                          <a href="#edit{{$seller->id}}" data-bs-toggle="modal" class="btn btn-sm btn-warning"><i class='fa fa-edit'></i> Edit</a> 
                          <a href="#delete{{$seller->id}}" data-bs-toggle="modal" class="btn btn-sm btn-danger"><i class='fa fa-trash'></i> Hapus</a>
    
                          <!-- Edit Modal -->
                          <div class="modal fade" id="edit{{$seller->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="myModalLabel">Edit Seller</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                  {!! Form::model($seller, [ 'method' => 'patch','route' => ['seller.update', $seller->id] ]) !!}
                                  @csrf
                                  <div class="mb-3">
                                    {!! Form::label('name', 'Name') !!}
                                    {!! Form::text('name', $seller->name, $attributes = $errors->has('name') ?
                                    ['class' => 'form-control is-invalid'] : ['class' => 'form-control'] ) !!}
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    {!! Form::label('address', 'Address') !!}
                                    {!! Form::text('address', $seller->address, $attributes = $errors->has('address') ?
                                    ['class' => 'form-control is-invalid'] : ['class' => 'form-control'] ) !!}
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                      {!! Form::label('gender', 'Gender') !!}
                                      {!! Form::select('gender', array('M' => 'Male', 'F' => 'Female'), $seller->gender, ['class' => 'form-control']) !!}
                                  </div>
                                  <div class="mb-3">
                                    {!! Form::label('no_hp', 'No. HP') !!}
                                    {!! Form::text('no_hp', $seller->no_hp, $attributes = $errors->has('no_hp') ?
                                    ['class' => 'form-control is-invalid'] : ['class' => 'form-control'] ) !!}
                                    @error('no_hp')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                      {!! Form::label('status', 'Status') !!}
                                      {!! Form::select('status', array('Active' => 'Active', 'Non Active' => 'Non Active'), $seller->status, ['class' => 'form-control'])!!}
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
                          <div class="modal fade" id="delete{{$seller->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                              <div class="modal-header">
                              <h5 class="modal-title" id="myModalLabel">Delete Confirmation</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              {!! Form::model($sellers, [ 'method' => 'delete','route' => ['seller.delete', $seller->id] ]) !!}
                              @csrf
                              <div class="alert alert-warning alert-dismissible fade show" role="alert">  
                                <strong>Are you sure to delete this seller?</strong><br><br>
                                <i class="fa fa-info-circle"></i> This action will remove products and seller permission in this seller. This action cannot be undone.
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
          {{ $sellers->links('pagination::bootstrap-5') }}
          <!-- Add Modal -->
          <div class="modal fade" id="addSeller" tabindex="-1" aria-labelledby="addSeller" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="addSeller">Add New Seller</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                {!! Form::open(['url' => 'seller/create']) !!}
                @csrf
                <div class="mb-3">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', '', $attributes = $errors->has('name') ?
                        ['class' => 'form-control is-invalid'] : ['class' => 'form-control'] ) !!}
                    @error('name')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    {!! Form::label('address', 'Address') !!}
                    {!! Form::text('address', '', $attributes = $errors->has('address') ?
                    ['class' => 'form-control is-invalid'] : ['class' => 'form-control'] ) !!}
                    @error('address')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    {!! Form::label('gender', 'Gender') !!}
                    {!! Form::select('gender', array('M' => 'Male', 'F' => 'Female'), '',
                    $attributes = $errors->has('gender') ? ['class' => 'form-control is-invalid', 'placeholder' => '- Select Gender -']
                    : ['class' => 'form-control', 'placeholder' => '- Select Gender -'])!!}
                    @error('gender')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    {!! Form::label('no_hp', 'No. HP') !!}
                    {!! Form::text('no_hp', '', $attributes = $errors->has('no_hp') ?
                    ['class' => 'form-control is-invalid'] : ['class' => 'form-control'] ) !!}
                    @error('no_hp')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::select('status', array('Active' => 'Active', 'Non Active' => 'Non Active'), '',
                    $attributes = $errors->has('status') ? ['class' => 'form-control is-invalid', 'placeholder' => '- Select Status -']
                    : ['class' => 'form-control', 'placeholder' => '- Select Status -'])!!}
                    @error('status')
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