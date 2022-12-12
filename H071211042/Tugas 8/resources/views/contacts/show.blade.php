@extends('contacts.layout')
@section('content')
<div class="card">
  <div class="card-header">Show Page</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Nim : {{ $contact->nim }}</h5>
        <p class="card-text">Nama : {{ $contact->nama }}</p>
        <p class="card-text">Alamat : {{ $contact->alamat }}</p>
  </div>
      
    </hr>
  
  </div>
</div>