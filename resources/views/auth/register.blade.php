<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-ijotuabg from-50% to-ijomudabg to-50% flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-8 w-96">
        <h2 class="text-2xl font-bold text-center mb-6">Sign Up</h2>
        <form action="{{ route('auth.register.post') }}" method="POST">
          @csrf
        <div class="flex flex-col gap-4 mb-12">
  <input
    type="text"
    name="name"
    placeholder="name"
    class="w-full text-left border border-black rounded-xl py-3 px-4 placeholder-black/30 focus:outline-none"
  />
  <input
    type="email"
    name="email"
    placeholder="email"
    class="w-full text-left border border-black rounded-xl py-3 px-4 placeholder-black/30 focus:outline-none"
  />
  <input
    type="password"
    name="password"
    placeholder="Password"
    class="w-full text-left border border-black rounded-xl py-3 px-4 placeholder-black/30 focus:outline-none"
  />
</div>

            <button type="submit" class="bg-ijotuabg text-white rounded-full w-full py-4 hover:bg-green-500">Sign Up</button>
        </form>
        <p class="mt-4 text-center text-gray-600">Sudah punya akun? <a href="{{ route('auth.login') }}" class="text-black font-semibold">Sign In</a></p>
    </div>
    <div class="bg-white"></div>
</body>
</html>