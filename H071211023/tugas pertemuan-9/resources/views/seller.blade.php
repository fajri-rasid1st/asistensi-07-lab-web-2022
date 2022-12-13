@extends('layouts.main')

@section('container')
     <!-- awal container -->
  <div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add Seller
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Seller</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <div class="card-body">
              <!-- awal form -->
              <form action="/seller/add" method="POST">
                @csrf
                <input type="hidden" name="id" id="id" value="">
                <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" name="name" id="name" value="" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Address</label>
                  <input type="text" name="address" id="address" value="" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Gender</label>
                  <select class="form-control" name="gender" id="gender" required>
                    <option value="">Pilih Gender</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                  {{-- <input type="text" name="gender" id="gender" value="" class="form-control" required> --}}
                </div>
                <div class="mb-3">
                  <label class="form-label">Nomor_Hp</label>
                  <input type="number" name="no_hp" id="no_hp" value="" class="form-control" required>
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
              <!-- akhir form -->

            </div>
            <div class="card-footer bg-danger bg-gradient">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="card mt-4">
      <div class="card-header bg-primary bg-gradient text-white">
        Daftar Seller
      </div>
      <div class="card-body">
       
        <div class="table-responsive">
          <table class="table table-striped table-hover table bordered">
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Address</th>
              <th>Gender</th>
              <th>Nomor HP</th>
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
              <td>{{$item->address}}</td>
              <td>{{$item->gender}}</td>
              <td>{{$item->no_hp}}</td>
              <td>{{$item->status}}</td>
              <td>{{$item->created_at}}</td>
              <td>{{$item->updated_at}}</td>
              <td>
                <a href="#" class="btn" style="color : white; background : #658978;" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$item->id}}">Edit</a>
                <a href="/seller/delete/{{$item->id}}" onclick="return confirm('ingin hapus data?')" class="btn btn-success">Delete</a>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Seller</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                    <div class="card-body">
                      <form action="/seller/update/{{$singleData->id}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id" value="">
                        <div class="mb-3">
                          <label class="form-label">Name</label>
                          <input type="text" name="name" id="name" value="{{$singleData->name}}" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Address</label>
                          <input type="text" name="address" id="address" value="{{$singleData->address}}" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Gender</label>
                          <select class="form-control" name="gender" id="gender">
                            <option value="Laki-laki" {{ $singleData->gender == 'Laki-laki' ? 'selected' : '' }} >Laki-laki</option>
                            <option value="Perempuan" {{ $singleData->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Nomor_Hp</label>
                          <input type="number" name="no_hp" id="no_hp" value="{{$singleData->no_hp}}" class="form-control">
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
