@extends("app")

@section("content")

<div class="card my-5" id="product">
    <div class="card-header bg-dark text-white">Products List</div>    
    <div class="card-body">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">
      <i class='fa fa-plus'></i> Add New Product
      </button>
      <div class="table-responsive mt-3">
          <table class="table table-bordered">
              <thead class="bg-dark text-white">
                  <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Name</th>
                      <th scope="col">Seller</th>
                      <th scope="col">Category</th>
                      <th scope="col">Price</th>
                      <th scope="col">Status</th>
                      <th scope="col">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($products as $product)
                  <tr> 
                      <td>{{$loop->iteration}}</td>
                      <td>{{$product->name}}</td>
                      <td>{{$product->seller->name}}</td>
                      <td>{{$product->category_id}}</td>
                      <td>{{$product->price}}</td>
                      <td>{{$product->status}}</td>
                      <td>
                          <a href="#edit{{$product->id}}" data-bs-toggle="modal" class="btn btn-sm btn-warning"><i class='fa fa-edit'></i> Edit</a> 
                          <a href="#delete{{$product->id}}" data-bs-toggle="modal" class="btn btn-sm btn-danger"><i class='fa fa-trash'></i> Hapus</a>
    
                          <!-- Edit Modal -->
                          <div class="modal fade" id="edit{{$product->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="myModalLabel">Edit Product</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                  {!! Form::model($product, [ 'method' => 'patch','route' => ['product.update', $product->id] ]) !!}
                                  @csrf
                                  <div class="mb-3">
                                    {!! Form::label('name', 'Name') !!}
                                    {!! Form::text('name', $product->name, $attributes = $errors->has('name') ?
                                        ['class' => 'form-control is-invalid'] : ['class' => 'form-control'] ) !!}
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
																		{!! Form::label('seller', 'Seller') !!}
																		{!! Form::select('seller_id', $sellers, $product->seller_id, ['class' => 'form-control']) !!}
																	</div>
                                  <div class="mb-3">
                                    {!! Form::label('category', 'Category') !!}
                                    {!! Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control']) !!}
                                    </div>
                                  <div class="mb-3">
																		{!! Form::label('price', 'Price') !!}
																		{!! Form::number('price', $product->price, $attributes = $errors->has('price') ?
                                        ['class' => 'form-control is-invalid', 'step' => 'any'] : ['class' => 'form-control', 'step' => 'any']) !!}
																		@error('price')
                                      <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                      {!! Form::label('status', 'Status') !!}
                                      {!! Form::select('status', array('Available' => 'Available', 'Unavailable' => 'Unavailable'), $product->status, ['class' => 'form-control'])!!}
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
                          <div class="modal fade" id="delete{{$product->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                              <div class="modal-header">
                              <h5 class="modal-title" id="myModalLabel">Delete Confirmation</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              {!! Form::model($products, [ 'method' => 'delete','route' => ['product.delete', $product->id] ]) !!}
                              @csrf
                              <div class="alert alert-warning alert-dismissible fade show" role="alert">  
                                <strong>Are you sure to delete this product?</strong><br><br>
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
          {{ $products->links('pagination::bootstrap-5') }}
          <!-- Add Modal -->
          <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProduct" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="addProduct">Add New Product</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                {!! Form::open(['url' => 'product/create']) !!}
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
										{!! Form::label('seller', 'Seller') !!}
										{!! Form::select('seller', $sellers, '', $attributes = $errors->has('seller') ?
											['class' => 'form-control is-invalid', 'placeholder' => '- Select Seller -']
                      : ['class' => 'form-control', 'placeholder' => '- Select Seller -'])!!}
									@error('seller')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
									@enderror
								</div>
								<div class="mb-3">
										{!! Form::label('category', 'Category') !!}
										{!! Form::select('category', $categories, '', $attributes = $errors->has('category') ?
											['class' => 'form-control is-invalid', 'placeholder' => '- Select Category -']
                      : ['class' => 'form-control', 'placeholder' => '- Select Category -'])!!}
									@error('category')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
									@enderror
								</div>
								<div class="mb-3">
									{!! Form::label('price', 'Price') !!}
									{!! Form::number('price', '', $attributes = $errors->has('price') ?
											['class' => 'form-control is-invalid', 'step' => 'any'] :
											['class' => 'form-control', 'step' => 'any']) !!}
									@error('price')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
									@enderror
								</div>
                <div class="mb-3">
                  {!! Form::label('status', 'Status') !!}
                  {!! Form::select('status', array('Available' => 'Available', 'Unavailable' => 'Unavailable'), '',
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