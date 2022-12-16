@extends('BackEnd.master')
@section('title')
    tag page
@endsection

@section('content')
@if (session()->has('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  @endif
<form action="/dashboard/tags/{{$tags->id}}" method="POST">
  @csrf
  @method('PATCH')
  <div class="mb-3">
    <label for="name">Tag</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$tags->name}}">
    @error('name')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary btn-sm">Edit</button>
  <a href="/dashboard/tags" class="btn btn-secondary btn-sm">Kembali</a>
</form>
@endsection