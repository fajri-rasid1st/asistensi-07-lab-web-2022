<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/fontawesome/css/all.min.css') }}">
        <title>SGB Team Members Laravel CRUD</title>
    </head>
    <body>
        <div class="container">
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