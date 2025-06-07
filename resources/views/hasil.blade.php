<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        Hasil
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        /* Custom font family for the entire page */
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<x-swal />

<body class="bg-[#eaf3ea] min-h-screen flex flex-col">
    @include('components.navbar')
    <main class="flex flex-col justify-center items-center gap-4 px-6 py-8 flex-grow max-w-4xl mx-auto w-full">
        <div class="flex justify-center w-full">
            <img src="{{ $gambar }}" class="rounded-lg max-w-full h-auto" width="300" alt="Hasil Klasifikasi">
        </div>
        <aside class="text-center w-full text-sm sm:text-base">
            <p class="mb-1">
                Dikategorikan sebagai
            </p>
            <p class="font-bold text-base sm:text-lg">{{ $hasil }}</p>
        </aside>
    </main>
    <section class="max-w-4xl mx-auto px-6 pb-10 w-full">
        <h2 class="font-bold text-lg sm:text-xl mb-2">
            Penyelesaian
        </h2>
        <p class="text-sm sm:text-base mb-6">
        {{ $deskripsi }}
        </p>
        <div class="flex justify-center">
            <button onclick="simpanHasil('{{ $hasil }}', '{{ $gambar }}')"
                class="bg-[#4a6a3a] text-white text-sm sm:text-base rounded-full px-6 py-2 hover:bg-[#3e5a2f] transition-colors"
                type="button">
                Simpan Hasil
            </button>
        </div>
    </section>

    <script>
        function simpanHasil(hasil, gambar) {
            fetch("{{ route('simpan.history') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ hasil, gambar })
            })
                .then(res => res.json())
                .then(data => alert(data.message))
                .catch(err => alert("Gagal simpan hasil"));
        }
    </script>
</body>

</html>