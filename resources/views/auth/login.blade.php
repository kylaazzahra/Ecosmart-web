<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-ijotuabg from-50% to-ijomudabg to-50% flex items-center justify-center min-h-screen">
<x-swal />
    <div class="bg-white rounded-lg shadow-lg p-8 w-96">
        <h2 class="text-2xl font-bold text-center mb-6">Sign In</h2>
        <form action="{{ route('auth.login.post') }}" method="POST">
            @csrf
        <div class="flex flex-col gap-4 mb-12">
  <input
    type="email"
    placeholder="Email"
    name="email"
    class="w-full text-left border border-black rounded-xl py-3 px-4 placeholder-black focus:outline-none"
  />
  <input
    type="password"
    placeholder="Password"
    name="password"
    class="w-full text-left border border-black rounded-xl py-3 px-4 placeholder-black focus:outline-none"
  />
</div>

            <button type="submit" class="bg-ijotuabg text-white rounded-full w-full py-4 hover:bg-green-500">Sign In</button>
        </form>
        <p class="mt-4 text-center text-gray-600">Belum punya akun? <a href="{{ route('auth.register') }}" class="text-black font-semibold">Sign Up</a></p>
    </div>
    <div class="bg-white"></div>
</body>
</html>