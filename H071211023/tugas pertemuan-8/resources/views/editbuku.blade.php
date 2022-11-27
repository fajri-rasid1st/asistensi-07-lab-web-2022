<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>tugas Praktikum PHP</title>

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
  <!-- awal container -->
  <div class="container">
    <h1 class="text-center mt-4 mb-2" style="color : #010A43;"><b>Book Store Edition</b></h1>

    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card">
          <div class="card-header bg-danger bg-gradient text-white">
            Form Tambah Buku
          </div>
          @if (session('status'))
          <h6 class="alert alert-success">{{ session('status') }}</h6>
          @endif


          <div class="card-body">
            <!-- awal form -->
            <form action="/tokobuku/update/{{$singleData->id}}" method="POST">
              @csrf
              <input type="hidden" name="id" id="id" value="<?= isset($vid) ? $vid : "" ?>"></input>
              <div class="mb-3">
                <label class="form-label">Judul Buku</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $singleData->judul) }}" class="form-control @error('judul') is-invalid @enderror">
                @error('judul')
                <small class="d-block text-danger mt-1 mb-3"> {{ $message }} </small>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Penerbit Buku</label>
                <input type="text" name="penerbit" id="penerbit" value="{{ old('penerbit', $singleData->penerbit) }}" class="form-control @error('penerbit') is-invalid @enderror">
                @error('penerbit')
                <small class="d-block text-danger mt-1 mb-3"> {{ $message }} </small>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Genre Buku</label>
                <input type="text" name="genre" id="genre" value="{{ old('genre', $singleData->genre) }}" class="form-control @error('genre') is-invalid @enderror">
                @error('genre')
                <small class="d-block text-danger mt-1 mb-3"> {{ $message }} </small>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Pengarang Buku</label>
                <input type="text" name="pengarang" id="pengarang" value="{{ old('pengarang', $singleData->pengarang) }}" class="form-control @error('pengarang') is-invalid @enderror">
                @error('pengarang')
                <small class="d-block text-danger mt-1 mb-3"> {{ $message }} </small>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">ISBN</label>
                <input type="text" name="isbnbuku" id="isbnbuku" value="{{ old('isbnbuku', $singleData->isbnbuku) }}" class="form-control @error('isbnbuku') is-invalid @enderror">
                @error('isbnbuku')
                <small class="d-block text-danger mt-1 mb-3"> {{ $message }} </small>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Harga Buku</label>
                <input type="number" name="harga" id="harga" value="{{ old('harga', $singleData->harga) }}" class="form-control @error('harga') is-invalid @enderror">
                @error('harga')
                <small class="d-block text-danger mt-1 mb-3"> {{ $message }} </small>
                @enderror
              </div>
              <div class="col-12 text-center">
                <input type="submit" name="simpan" value="Simpan Data" class="btn" style="color : white; background : #010A43;" />
              </div>
            </form>

          </div>
          <div class="card-footer bg-danger bg-gradient">

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- akhir container -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</body>

</html>