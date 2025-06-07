<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        About Us
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        /* Use a monospace font for the paragraph text */
        .mono-font {
            font-family: monospace;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-ijotuabg from-50% to-ijomudabg to-50% flex items-center justify-center min-h-screen">

    <div class="absolute top-4 left-4 text-white font-semibold text-lg flex items-center space-x-2">
        <a href="{{ route('home') }}" class="hover:underline">
            <i class="fas fa-arrow-left"></i>
        </a>
        <span>
            Tentang Kami
        </span>
    </div>

    <div class="flex-1 flex items-center justify-center">
        <div class="max-w-5xl w-full mx-4 md:mx-auto bg-white rounded-xl p-16 shadow-md">
            <h2 class="text-center font-extrabold text-3xl mb-6">
                ABOUT ECOSMART
            </h2>
            <p class="text-center text-gray-700 text-base mono-font mb-12 px-6 leading-relaxed">
                Aplikasi pengelolaan limbah menggunakan teknologi pengenalan gambar dan pembelajaran mesin untuk
                mengklasifikasikan jenis limbah dari gambar pengguna. Tujuan aplikasi ini adalah meningkatkan kesadaran
                masyarakat tentang pengelolaan limbah yang benar dan mendukung praktik berkelanjutan.
            </p>

            <div class="flex justify-center overflow-x-auto space-x-10 px-4">
                <div class="flex flex-col items-center min-w-[120px]">
                    <img alt="Kyla" class="w-40 h-36 rounded-full object-cover"
                        src="{{ asset('images/kyla.png') }}" />
                    <span class="font-bold mt-3 text-md">Kyla</span>
                </div>
                <div class="flex flex-col items-center min-w-[120px]">
                    <img alt="Septya" class="w-40 h-36 rounded-full object-cover"
                        src="{{ asset('images/septya.png') }}" />
                    <span class="font-bold mt-3 text-md">Septya</span>
                </div>
                <div class="flex flex-col items-center min-w-[120px]">
                    <img alt="Fakhir" class="w-40 h-36 rounded-full object-cover"
                        src="{{ asset('images/fakhir.png') }}" />
                    <span class="font-bold mt-3 text-md">Fakhir</span>
                </div>
                <div class="flex flex-col items-center min-w-[120px]">
                    <img alt="Nathan" class="w-40 h-36 rounded-full object-cover"
                        src="{{ asset('images/nathan.png') }}" />
                    <span class="font-bold mt-3 text-md">Nathan</span>
                </div>
                <div class="flex flex-col items-center min-w-[120px]">
                    <img alt="Ario" class="w-40 h-36 rounded-full object-cover"
                        src="{{ asset('images/ario.png') }}" />
                    <span class="font-bold mt-3 text-md">Ario</span>
                </div>
            </div>
        </div>
    </div>
</body>



</html>