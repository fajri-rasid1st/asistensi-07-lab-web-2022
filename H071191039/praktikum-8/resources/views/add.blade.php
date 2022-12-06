@extends('layouts.main')

@section('content')
<form action="/add/update/{{ $mahasiswas->id }}" method="POST">
    @csrf
    {{-- @method('put') --}}
    <input type="text" name="nama" id="nama" value="{{ $mahasiswas->nama }}">
    <input type="text" name="nim" id="nim" value="{{ $mahasiswas->nim }}">
    <input type="text" name="alamat" id="alamat" value="{{ $mahasiswas->alamat }}">
    <input type="text" name="fakultas" id="fakultas" value="{{ $mahasiswas->fakultas }}">
    <br>
    <button type="submit" class="btn btn-primary mt-4">update</button>
</form>
@endsection