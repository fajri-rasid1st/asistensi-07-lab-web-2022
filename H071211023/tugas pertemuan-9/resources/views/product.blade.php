@extends('layouts.main')

@section('container')
  <div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add Product
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <div class="card-body">
              <form action="/product/add" method="POST">
                @csrf
                <input type="hidden" name="id" id="id" value="">
                <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" name="name" id="name" value="" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="seller_id" class="form-label">Seller_id</label>
                  
                    <select class="form-select" name="seller_id" id="seller_id">
                      <option value="">Pilih Seller</option>
                      @foreach($seler as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="mb-3">
                  <label for="category_id" class="form-label">Category_id</label>
                  
                    <select class="form-select" name="category_id" id="category_id">
                      <option value="">Pilih Category</option>
                      @foreach($kategori as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                  
                </div>
                <div class="mb-3">
                  <label class="form-label">Price</label>
                  <input type="text" name="price" id="price" value="" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Status</label>
                  <input type="text" name="status" id="status" value="" class="form-control" required>
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
        Daftar Product
      </div>
      <div class="card-body">
        
        <div class="table-responsive">
          <table class="table table-striped table-hover table bordered">
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Seller_id</th>
              <th>Category_id</th>
              <th>Price</th>
              <th>status</th>
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
              <td>{{$item->name}}</td>
              <td>{{$item->seller->name}}</td>
              <td>{{$item->category->name}}</td>
              <td>{{$item->price}}</td>
              <td>{{$item->status}}</td>
              <td>{{$item->created_at}}</td>
              <td>{{$item->updated_at}}</td>
              <td>
                <a href="#" class="btn" style="color : white; background : #658978;" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$item->id}}">Edit</a>
                <a href="/product/delete/{{$item->id}}" onclick="return confirm('ingin hapus data?')" class="btn btn-success">Delete</a>
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
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="card-body">                       
                        <form action="/product/update/{{$singleData->id}}" method="POST">
                          @csrf
                          <input type="hidden" name="id" id="id" value="">
                          <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" id="name" value="{{$singleData->name}}" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="seller_id" class="form-label">Seller_id</label>
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
                            <label for="category_id" class="form-label">Category_id</label>
                              <select class="form-select" name="category_id" id="category_id">
                                @foreach($kategori as $item)
                                <option value="{{$item->id}}"
                                  {{$item->id == $singleData->category_id ? 'selected' : '' }}>
                                  {{$item->name}}
                                </option>
                                @endforeach
                              </select>
                            
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="text" name="price" id="price" value="{{$singleData->price}}" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Status</label>
                            <input type="text" name="status" id="status" value="{{$singleData->status}}" class="form-control">
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