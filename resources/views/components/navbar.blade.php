<header class="bg-[#4f7543] text-white flex justify-between items-center px-6 py-0">
        <h1 class="font-semibold text-lg" style="font-family: 'Inter', sans-serif;">
            Ready to save the Earth?
        </h1>
        <div class="text-right">
            <div class="font-bold text-base sm:text-lg">
                
                Selamat Datang! {{ Auth::check() ? Auth::user()->name : 'Guest' }}
            </div>
            <div class="text-[#a3b18a] text-sm mt-1">
                {{ Auth::check() ? Auth::user()->email : 'Please log in' }}
            </div>
            @guest
            <div class="bg-[#a3b18a] w-64 flex justify-center items-center text-sm mt-1 rounded-lg py-2 hover:bg-[#8a9f7c] transition-colors">
                <a href="{{ route('auth.login') }}" class="text-white hover:underline">Login</a>
            </div>
            @endguest
        </div>
    </header>
    <nav class="bg-[#4f7543] text-white flex justify-center space-x-10 py-2 text-sm"
        style="font-family: 'Inter', sans-serif;">
        <a class="flex items-center space-x-1 {{ request()->is('*home*') ? 'border-b-2 border-white pb-1' : '' }}"  href="{{ route('home') }}">
            <i class="fas fa-home text-xs">
            </i>
            <span>
                Home
            </span>
        </a>
        <a class="flex items-center space-x-1 {{ request()->is('*camera*') ? 'border-b-2 border-white pb-1' : '' }}" href="{{ route('camera') }}">
            <i class="fas fa-camera text-xs">
            </i>
            <span>
                Camera
            </span>
        </a>
        <a class="flex items-center space-x-1 {{ request()->is('*profile') ? 'border-b-2 border-white pb-1' : '' }}" href="{{ route('profile') }}">
            <i class="fas fa-user text-xs">
            </i>
            <span>
                Profile
            </span>
        </a>
        @if(Auth::check() && Auth::user()->role === 'admin')
        <a class="flex items-center space-x-1" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-user text-xs">
            </i>
            <span>
                Admin Dashboard
            </span>
        </a>
        @endif
    </nav>