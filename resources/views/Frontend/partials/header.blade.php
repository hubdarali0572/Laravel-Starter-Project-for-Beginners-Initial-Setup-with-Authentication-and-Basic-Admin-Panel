<header class="fixed top-0 inset-x-0 z-50 border-b border-white/10 bg-white/80 backdrop-blur-lg dark:bg-zinc-950/80 dark:border-zinc-800/60">
    <nav class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3 group">
            <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-indigo-600 text-white shadow-lg shadow-indigo-600/25 group-hover:scale-105 transition-transform">
                <i class="fa-solid fa-layer-group text-sm"></i>
            </span>
            <span class="font-bold text-zinc-900 dark:text-white tracking-tight">Laravel Starter</span>
        </a>

        <div class="hidden md:flex items-center gap-8">
            <a href="{{ route('home') }}"
                class="text-sm font-medium {{ request()->routeIs('home') ? 'text-indigo-600 dark:text-indigo-400' : 'text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400' }} transition-colors">Home</a>
            <a href="{{ route('about') }}"
                class="text-sm font-medium {{ request()->routeIs('about') ? 'text-indigo-600 dark:text-indigo-400' : 'text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400' }} transition-colors">About
                Us</a>
            <a href="{{ route('contact') }}"
                class="text-sm font-medium {{ request()->routeIs('contact') ? 'text-indigo-600 dark:text-indigo-400' : 'text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400' }} transition-colors">Contact
                Us</a>
        </div>

        <div class="flex items-center gap-3">
            @guest
                <a href="{{ route('login') }}"
                    class="hidden sm:inline-flex px-4 py-2 text-sm font-semibold text-zinc-700 dark:text-zinc-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                    Sign In
                </a>
                <a href="{{ route('register') }}"
                    class="inline-flex px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 shadow-md shadow-indigo-600/20 transition-all">
                    Get Started
                </a>
            @else
                <a href="{{ route('dashboard.index') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 shadow-md shadow-indigo-600/20 transition-all">
                    Dashboard
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            @endguest
        </div>
    </nav>
</header>
