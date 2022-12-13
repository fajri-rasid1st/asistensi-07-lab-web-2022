@extends('layouts.main')

@section('container')
<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add Seller Permission
    </button>

    <!-- Modal add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Seller_Permission</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <div class="card-body">             
              <form action="/seller_permission/add" method="POST">
                @csrf
                <input type="hidden" name="id" id="id" value="">
                <div class="mb-3">
                  <label for="seller_id" class="form-label">Seller</label>
                    <select class="form-select" name="seller_id" id="seller_id">
                      <option value="">Pilih Seller</option>
                      @foreach($seler as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                </div>

                <div class="mb-3">
                  <label for="permission_id" class="form-label">Permission</label>
                    <select class="form-select" name="permission_id" id="permission_id">
                      <option value="">Pilih Permission</option>
                      @foreach($perm as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="col-12 text-center">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <input type="submit" name="simpan" value="Save" class="btn" style="color : white; background : #010A43;" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="card mt-4">
      <div class="card-header bg-primary bg-gradient text-white">
        Daftar Permission
      </div>
      <div class="card-body">
        
        <div class="table-responsive">
          <table class="table table-striped table-hover table bordered">
            <tr>
              <th>No.</th>
              <th>Seller_id</th>
              <th>Permission_id</th>
              <th>Created at</th>
              <th>Updated at</th>
              <th>Aksi</th>
            </tr>

            @php
              $i = ($data->currentpage()-1)*$data->perpage()+1;
            @endphp

            @foreach($data as $item)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$item->seller->name}}</td>
              <td>{{$item->permission->name}}</td>
              <td>{{$item->created_at}}</td>
              <td>{{$item->updated_at}}</td>
              <td>
                <a href="#" class="btn" style="color : white; background : #658978;" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$item->id}}">Edit</a>
                <a href="/seller_permission/delete/{{$item->id}}" onclick="return confirm('ingin hapus data?')" class="btn btn-success">Delete</a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>

        {{-- edit data --}}
        @foreach($data as $singleData)
        <div class="modal fade" id="exampleModal-{{$singleData->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Seller_Permission</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="card-body">
                  <form action="/seller_permission/update/{{$singleData->id}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id" value="">
                    <div class="mb-3">
                      <label for="seller_id" class="form-label">Seller</label>
                      <select class="form-select" name="seller_id" id="seller_id">
                        @foreach($seler as $item)
                          <option value="{{$item->id}}"
                            {{$item->id == $singleData->seller_id ? 'selected' : '' }}>
                            {{$item->name}}
                          </option>
                        @endforeach
                      </select>
                </div>

                <div class="mb-3">
                  <label for="permission_id" class="form-label">Permission</label>
                    <select class="form-select" name="permission_id" id="permission_id">
                      @foreach($perm as $item)
                        <option value="{{$item->id}}"
                          {{$item->id == $singleData->permission_id ? 'selected' : ''}}>
                          {{$item->name}}
                        </option>
                      @endforeach
                    </select>
                </div>
                    <div class="col-12 text-center">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <input type="submit" name="simpan" value="Save Changes" class="btn" style="color : white; background : #010A43;" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
      <div class="pagination justify-content-center">
        {{$data->links()}}
      </div>
      <div class="card-footer bg-primary bg-gradient text-center">
      </div>
    </div>
@endsection