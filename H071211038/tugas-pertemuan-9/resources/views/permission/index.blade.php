@extends("app")

@section("content")

<div class="card my-5" id="permission">
    <div class="card-header bg-dark text-white">Permissions List</div>    
    <div class="card-body">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewModal">
        <i class='fa fa-plus'></i> Add New Permission
        </button>
        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->description}}</td>
                        <td>{{$permission->status}}</td>
                        <td>
                            <a href="#edit{{$permission->id}}" data-bs-toggle="modal" class="btn btn-sm btn-warning"><i class='fa fa-edit'></i> Edit</a> 
                            <a href="#delete{{$permission->id}}" data-bs-toggle="modal" class="btn btn-sm btn-danger"><i class='fa fa-trash'></i> Hapus</a>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="edit{{$permission->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Edit Permission</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    {!! Form::model($permission, [ 'method' => 'patch','route' => ['permission.update', $permission->id] ]) !!}
                                    @csrf
                                    <div class="mb-3">
                                        {!! Form::label('name', 'Name') !!}
                                        {!! Form::text('name', $permission->name, $attributes = $errors->has('name') ?
                                            ['class' => 'form-control is-invalid'] : ['class' => 'form-control'] ) !!}
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        {!! Form::label('description', 'Description') !!}
                                        {!! Form::text('description', $permission->description, $attributes = $errors->has('description') ?
                                            ['class' => 'form-control is-invalid'] : ['class' => 'form-control'] ) !!}
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        {!! Form::label('status', 'Status') !!}
                                        {!! Form::select('status', array('Active' => 'Active', 'Non Active' => 'Non Active'), $permission->status, ['class' => 'form-control'])!!}
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
                            <div class="modal fade" id="delete{{$permission->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">Delete Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                {!! Form::model($permissions, [ 'method' => 'delete','route' => ['permission.delete', $permission->id] ]) !!}
                                @csrf
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">  
                                <strong>Are you sure to delete this permission?</strong><br><br>
                                <i class="fa fa-info-circle"></i> This action will remove seller permissions in this permission and cannot be undone.
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
            {{ $permissions->links('pagination::bootstrap-5') }}
            <!-- Add Modal -->
            <div class="modal fade" id="addNewModal" tabindex="-1" aria-labelledby="addProduct" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addProduct">Add New Permission</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url' => 'permission/create']) !!}
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
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::text('description', '', $attributes = $errors->has('description') ?
                            ['class' => 'form-control is-invalid'] : ['class' => 'form-control'] ) !!}
                        @error('description')
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