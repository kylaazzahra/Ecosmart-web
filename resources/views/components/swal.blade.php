<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session('success') }}',
            timer: 1000,
            showConfirmButton: false,
            confirmButtonColor: '#4a7533',
        })
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session('error') }}',
            timer: 1000,
            showConfirmButton: false,
            confirmButtonColor: '#d33c3c',
        })
    </script>
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Ada yang salah!',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            timer: 1000,
            showConfirmButton: false,
            confirmButtonColor: '#d33c3c',
        })
    </script>
@endif
