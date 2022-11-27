@extends("app")

@section("content")
<div class="card my-5">
    <div class="card-header bg-dark text-white">Data members</div>    
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewMemberModal">
            <i class='fa fa-plus'></i> Add New Member
            </button>
            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</a></th>
                            <th scope="col">Akun Facebook</a></th>
                            <th scope="col">Email</th>
                            <th scope="col">Regional</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$member->nama}}</td>
                            <td>{{$member->akun_fb}}</td>
                            <td>{{$member->email}}</td>
                            <td>{{$member->regional}}</td>
                            <td>{{$member->tahun}}</td>
                            <td>
                                <a href="#edit{{$member->id}}" data-bs-toggle="modal" class="btn btn-sm btn-warning"><i class='fa fa-edit'></i> Edit</a> 
                                <a href="#delete{{$member->id}}" data-bs-toggle="modal" class="btn btn-sm btn-danger"><i class='fa fa-trash'></i> Hapus</a>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="edit{{$member->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Edit Member</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        {!! Form::model($member, [ 'method' => 'patch','route' => ['member.update', $member->id] ]) !!}
                                        <div class="mb-3">
                                            {!! Form::label('nama', 'Nama') !!}
                                            {!! Form::text('nama', $member->nama, ['class' => 'form-control', 'required'] ) !!}
                                        </div>
                                        <div class="mb-3">
                                            {!! Form::label('akun_fb', 'Akun Facebook') !!}
                                            {!! Form::text('akun_fb', $member->akun_fb, ['class' => 'form-control', 'required'] ) !!}
                                        </div>
                                        <div class="mb-3">
                                            {!! Form::label('email', 'Email') !!}
                                            {!! Form::text('email', $member->email, ['class' => 'form-control', 'required'] ) !!}
                                        </div>
                                        <div class="mb-3">
                                            {!! Form::label('regional', 'Regional') !!}
                                            {!! Form::text('regional', $member->regional, ['class' => 'form-control', 'required'] ) !!}
                                        </div>
                                        <div class="mb-3">
                                            {!! Form::label('tahun', 'Tahun') !!}
                                            {!! Form::selectYear('tahun', 2012, 2021, $member->tahun, ['class' => 'form-control', 'placeholder' => '- Pilih tahun bergabung -', 'required'] ) !!}
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
                                <div class="modal fade" id="delete{{$member->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Konfirmasi Hapus</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    {!! Form::model($members, [ 'method' => 'delete','route' => ['member.delete', $member->id] ]) !!}
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">  
                                    Apakah Anda yakin untuk menghapus data ini?
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
                {{ $members->links('pagination::bootstrap-5') }}
                <!-- Add Modal -->
                <div class="modal fade" id="addNewMemberModal" tabindex="-1" aria-labelledby="addNewMemberModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addNewMemberModalLabel">Add New Member</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['url' => 'create']) !!}
                        <div class="mb-3">
                        {!! Form::label('nama', 'Nama') !!}
                        {!! Form::text('nama', '', ['class' => 'form-control', 'required'] ) !!}
                        </div>
                        <div class="mb-3">
                        {!! Form::label('akun_fb', 'Akun Facebook') !!}
                        {!! Form::text('akun_fb', '', ['class' => 'form-control', 'required'] ) !!}
                        </div>
                        <div class="mb-3">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', '', ['class' => 'form-control', 'required'] ) !!}
                        </div>
                        <div class="mb-3">
                        {!! Form::label('regional', 'Regional') !!}
                        {!! Form::text('regional', '', ['class' => 'form-control', 'required'] ) !!}
                        </div>
                        <div class="mb-3">
                        {!! Form::label('tahun', 'Tahun') !!}
                        {!! Form::selectYear('tahun', 2012, 2021, '', ['class' => 'form-control', 'placeholder' => '- Pilih tahun bergabung -', 'required'] ) !!}
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
</div>
@endsection