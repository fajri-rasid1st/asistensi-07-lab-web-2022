@extends('contacts.layout')
@section('content')
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('contact/' .$contact->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$contact->id}}" id="id" />
        <label>NIM</label></br>
        <input type="text" name="nim" id="name" value="{{$contact->nim}}" class="form-control" required></br>
        <label>Nama</label></br>
        <input type="text" name="nama" id="address" value="{{$contact->nama}}" class="form-control" required></br>
        <label>Alamat</label></br>
        <input type="text" name="alamat" id="mobile" value="{{$contact->alamat}}" class="form-control" required></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop