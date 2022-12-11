@extends('layouts.main')

@section('content')
<table class="table table-striped">
    <thead>
        <th>No.</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Alamat</th>
        <th>Fakultas</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        @foreach ($mahasiswa as $person)
        <tr>
            <td>{{ $person->id }}</td>
            <td>{{ $person->nama }}</td>
            <td>{{ $person->nim }}</td>
            <td>{{ $person->alamat }}</td>
            <td>{{ $person->fakultas }}</td>
            <td>
                <a href="/add/edit/{{ $person->id }}" class="btn btn-success">Edit</a>
                <a href="/add/delete/{{ $person->id }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $mahasiswa->links() }}

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add Data
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/" method="POST">
                <div class="modal-body">
                    @csrf
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama">

                    <label for="nama">NIM</label>
                    <input type="text" class="form-control" name="nim" id="nim">

                    <label for="nama">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat">

                    <label for="nama">Fakultas</label>
                    <input type="text" class="form-control" name="fakultas" id="fakultas">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection