<nav class="navbar">
    <div class="flex items-center gap-4 px-4 w-full">
        <a href="#" class="sidebar-toggler flex items-center justify-center">
            <i data-feather="menu" class="w-5 h-5"></i>
        </a>

        <div class="flex-1 min-w-0">
            <h1 class="text-base font-semibold text-slate-800 truncate mb-0">
                @yield('title', 'Dashboard')
            </h1>
            @hasSection('subtitle')
                <p class="text-xs text-slate-500 mb-0 truncate">@yield('subtitle')</p>
            @endif
        </div>

        <div class="flex items-center gap-3">
            <button type="button" onclick="toggleTheme()" id="themeToggle"
                class="theme-toggle-btn inline-flex items-center justify-center w-9 h-9 rounded-full text-slate-600 transition-colors"
                title="Toggle dark mode">
                <i class="fas fa-moon text-sm theme-icon-dark"></i>
                <i class="fas fa-sun text-sm theme-icon-light"></i>
            </button>

            <a href="{{ url('/') }}" target="_blank"
                class="hidden sm:inline-flex items-center gap-2 px-3 py-1.5 text-xs font-medium text-slate-600 bg-slate-100 rounded-lg hover:bg-slate-200 transition-colors">
                <i class="fas fa-external-link-alt text-[10px]"></i>
                View Site
            </a>

            <div class="flex items-center gap-2.5 px-2 py-1.5 rounded-lg select-none">

                @php
                    $userTypeLabel = str_contains(strtolower((string) auth()->user()->user_type), 'super')
                        ? 'Super Admin'
                        : (auth()->user()->user_type ?? 'User');
                    $userTypeCode = collect(explode(' ', trim($userTypeLabel)))
                        ->filter()
                        ->map(fn($word) => strtoupper(substr($word, 0, 1)))
                        ->take(2)
                        ->implode('');
                @endphp
                <div class="hidden md:block leading-tight">
                    <p class="text-sm font-semibold text-slate-700 mb-0">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] uppercase tracking-wider text-slate-500 mb-0">{{ $userTypeLabel }}</p>
                </div>
                <span
                    class="flex h-8 w-8 items-center justify-center rounded-full bg-indigo-100 text-indigo-700 text-sm font-bold">
                    {{ $userTypeCode }}
                </span>
            </div>
        </div>
    </div>
</nav>