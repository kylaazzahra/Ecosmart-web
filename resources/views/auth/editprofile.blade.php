<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        Edit Profile
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Custom underline for active nav item */
        .active-underline {
            border-bottom-width: 3px;
            border-bottom-color: white;
        }
    </style>
</head>

<body class="bg-[#f0fcf5] font-sans h-screen overflow-hidden">
<x-swal />
    @include('components.navbar')
    <main class="flex justify-center items-center w-full h-full px-4">
    <section class="bg-white rounded-lg p-10 w-full max-w-md relative text-base">
        <img alt="Profile picture"
            class="w-24 h-24 rounded-full mx-auto -mt-20 mb-6 border-4 border-white shadow-md"
            src="{{ asset('images/profile.jpg') }}" />

        <span class="block text-center text-xl font-semibold mb-6">Profile</span>

        <form action="{{ route('profile.update') }}" method="POST" class="space-y-5">
        @method('PUT')
        @csrf
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Name</label>
                <input name="name" type="text"
                    class="w-full border border-gray-300 rounded-md px-4 py-3 text-sm text-gray-700"
                    value="{{ old('name', Auth::user()->name) }}" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                <input name="email" type="email"
                    class="w-full border border-gray-300 rounded-md px-4 py-3 text-sm text-gray-700"
                    value="{{ old('email', Auth::user()->email) }}" />
            </div>

            <button type="submit" class="w-full bg-[#4a7533] text-white text-sm font-semibold rounded-full py-3 cursor-pointer hover:bg-[#3c5e29] transition">
                <a class="block text-center">SIMPAN</a>
            </button>
            <div class="w-full bg-red-500 text-white text-sm font-semibold rounded-full py-3 cursor-pointer hover:bg-red-600 transition">
                <a href="{{ route('profile') }}" class="block text-center">Kembali</a>
            </div>
        </form>
    </section>
</main>

</body>


</html>