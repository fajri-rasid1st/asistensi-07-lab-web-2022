<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tugas Laravel 1</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #FFC1C2;
    }

    .card {
      margin-top: 10px;
      background-color: #FFEADD;
    }
  </style>
</head>

<body>

  <div class="container">
    <h1 class="text-center mt-4 mb-2"><b>Book Store Edition</b></h1>

    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card">
          <div class="card-header bg-danger bg-gradient text-white">
            Form Tambah Buku
          </div>
          @if (session('status'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span>{{ session('status') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <div class="card-body">

            <form action="/tokobuku/add" method="POST">
              @csrf
              <input type="hidden" name="id" id="id" value=""></input>
              <div class="mb-3">
                <label class="form-label">Judul Buku</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul') }}" class="form-control @error('judul') is-invalid @enderror ">
                @error('judul')
                <small class="d-block text-danger mt-1 mb-3"> {{ $message }} </small>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Penerbit Buku</label>
                <input type="text" name="penerbit" id="penerbit" value="{{ old('penerbit') }}" class="form-control @error('penerbit') is-invalid @enderror">
                @error('penerbit')
                <small class="d-block text-danger mt-1 mb-3"> {{ $message }} </small>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Genre Buku</label>
                <input type="text" name="genre" id="genre" value="{{ old('genre') }}" class="form-control @error('genre') is-invalid @enderror">
                @error('genre')
                <small class="d-block text-danger mt-1 mb-3"> {{ $message }} </small>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Pengarang Buku</label>
                <input type="text" name="pengarang" id="pengarang" value="{{ old('pengarang') }}" class="form-control @error('pengarang') is-invalid @enderror">
                @error('pengarang')
                <small class="d-block text-danger mt-1 mb-3"> {{ $message }} </small>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">ISBN</label>
                <input type="text" name="isbnbuku" id="isbnbuku" value="{{ old('isbnbuku') }}" class="form-control @error('isbnbuku') is-invalid @enderror">
                @error('isbnbuku')
                <small class="d-block text-danger mt-1 mb-3"> {{ $message }} </small>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Harga Buku</label>
                <input type="number" name="harga" id="harga" value="{{ old('harga') }}" class="form-control @error('harga') is-invalid @enderror">
                @error('harga')
                <small class="d-block text-danger mt-1 mb-3"> {{ $message }} </small>
                @enderror
              </div>
              <div class="col-12 text-center">
                <input type="submit" name="simpan" value="Simpan Data" class="btn" style="color : white; background : #30A2A0;" />
              </div>
            </form>

          </div>
          <div class="card-footer bg-danger bg-gradient">

          </div>
        </div>
      </div>
    </div>


    <div class="card mt-4">
      <div class="card-header bg-danger bg-gradient text-white">
        Form Daftar Buku
      </div>
      <div class="card-body">
        <div class="col-md-6 mx-auto">
        
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-hover table bordered">

            <tr>
              <th>No.</th>
              <th>Judul</th>
              <th>Penerbit</th>
              <th>Genre</th>
              <th>Pengarang</th>
              <th>ISBN</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>


            @foreach($data as $item)

            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->judul}}</td>
              <td>{{$item->penerbit}}</td>
              <td>{{$item->genre}}</td>
              <td>{{$item->pengarang}}</td>
              <td>{{$item->isbnbuku}}</td>
              <td>{{$item->harga}}</td>
              <td>
                <a href="/tokobuku/edit/{{$item->id}}" class="btn" style="color : white; background : #658978;">Edit</a>
                <a href="/tokobuku/delete/{{$item->id}}" onclick="return confirm('ingin hapus data?')" class="btn btn-danger">Hapus</a>
              </td>

            </tr>
            @endforeach

          </table>
        </div>
      </div>
      <div class="pagination justify-content-center">
        {{ $data->links() }}
      </div>
      <div class="card-footer bg-danger bg-gradient text-center">
        <form action="/logout" method="POST">
          @csrf
          <button class="btn text-white" type="submit">LogOut</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</body>

</html>