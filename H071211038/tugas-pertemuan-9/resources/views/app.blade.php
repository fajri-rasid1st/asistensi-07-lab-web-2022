<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/fontawesome/css/all.min.css') }}">
        <title>Laravel CRUD 2</title>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Quicksand:400,700&display=swap');
            body {
                font-family: Quicksand, Sans-serif;
            }
            a {
                text-decoration: none;
                color: white;
                line-height: 40px;
                padding: 0 25px;
                display: block;
                transition: all 0.5s;
            }
            a:hover {
                background-color: rgb(255,255,255,0.1);
                color: #f0c993;
            }
        </style>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-dark navbar-expand-lg bg-dark fixed-top">
                <div class="container-fluid">
                    <a class=" navbar-brand" href="/">
                        Laravel 2
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="/seller">Seller</a>
                            </li>
                            <li class="nav-item">
                                <a href="/category">Category</a>
                            </li>
                            <li class="nav-item">
                                <a href="/product">Product</a>
                            </li>
                            <li class="nav-item">
                                <a href="/permission">Permission</a>
                            </li>
                            <li class="nav-item">
                                <a href="/seller-permission">Seller Permission</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
        <div class="container pt-5">
            @yield("content")
        </div>
        <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
        @if (session("success"))
        <script>
            swal.fire({
            title: '{{ session("success") }}',
            icon: "success",
            });
        </script>
        @elseif (session("error"))
            <script>
                swal.fire({
                title: '{{ session("error") }}',
                icon: "error",
                });
            </script>
        @endif
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>