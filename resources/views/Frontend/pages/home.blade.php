@extends('Frontend.frontend-layout.app')

@section('content')

  <!-- Compact Professional Hero -->
  <main class="relative bg-zinc-50 dark:bg-zinc-950 min-h-[85vh] flex items-center py-12 overflow-hidden">

    <!-- Subtle Technical Background -->
    <div class="absolute inset-0 z-0">
      <div
        class="absolute inset-0 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] dark:bg-[radial-gradient(#18181b_1px,transparent_1px)] [background-size:24px_24px] [mask-image:radial-gradient(ellipse_50%_50%_at_50%_50%,#000_70%,transparent_100%)]">
      </div>
    </div>

    <div class="relative z-10 max-w-5xl mx-auto px-6">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

        <div class="lg:col-span-12 text-center">
          <!-- Status Badge -->
          <div
            class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 dark:bg-indigo-950/30 border border-indigo-100 dark:border-indigo-900/50 mb-6">
            <span class="relative flex h-2 w-2">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
            </span>
            <span class="text-[10px] uppercase tracking-widest font-bold text-indigo-600 dark:text-indigo-400">
              System v{{ app()->version() }} • PHP 8.2+
            </span>
          </div>

          <!-- Professional Title -->
          <h1 class="text-4xl md:text-5xl font-black tracking-tight text-zinc-900 dark:text-white leading-tight mb-6">
            Enterprise-Grade <span class="text-indigo-600">Application Architecture</span>
          </h1>

          <!-- Professional Description -->
          <p class="text-lg text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto leading-relaxed mb-10">
            A robust technical foundation for scalable web applications.
            Built on <strong>Laravel 12</strong>, this instance demonstrates a secure
            ecosystem featuring <strong>Immutable Activity Logs</strong> and
            <strong>Granular RBAC Security</strong> for professional governance.
          </p>

          <!-- Centered Buttons -->
          <div class="flex flex-wrap justify-center gap-4">
            @guest
              <a href="{{ route('login') }}"
                class="px-8 py-3 bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 rounded-lg font-bold shadow-xl hover:bg-zinc-800 dark:hover:bg-zinc-100 transition-all">
                Sign In
              </a>
              <a href="{{ route('register') }}"
                class="px-8 py-3 bg-white dark:bg-zinc-900 text-zinc-900 dark:text-white border border-zinc-200 dark:border-zinc-800 rounded-lg font-bold hover:bg-zinc-50 dark:hover:bg-zinc-800 transition-all">
                Register Instance
              </a>
            @else
              <a href="{{ route('dashboard') }}"
                class="px-8 py-3 bg-indigo-600 text-white rounded-lg font-bold shadow-lg hover:bg-indigo-700 transition-all flex items-center gap-2">
                Go to Console
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
              </a>
            @endguest
          </div>

          <!-- Technical Features Footnote -->
          <div class="mt-16 pt-8 border-t border-zinc-200 dark:border-zinc-800 grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="text-center md:text-left">
              <span class="block text-[10px] uppercase font-black text-zinc-400 tracking-tighter">Security</span>
              <span class="text-xs font-bold dark:text-zinc-300">Spatie Permissions</span>
            </div>
            <div class="text-center md:text-left">
              <span class="block text-[10px] uppercase font-black text-zinc-400 tracking-tighter">Transparency</span>
              <span class="text-xs font-bold dark:text-zinc-300">Spatie ActivityLog</span>
            </div>
            <div class="text-center md:text-left">
              <span class="block text-[10px] uppercase font-black text-zinc-400 tracking-tighter">Auth</span>
              <span class="text-xs font-bold dark:text-zinc-300">Laravel Breeze</span>
            </div>
            <div class="text-center md:text-left">
              <span class="block text-[10px] uppercase font-black text-zinc-400 tracking-tighter">Runtime</span>
              <span class="text-xs font-bold dark:text-zinc-300">PHP 8.2 (JIT Ready)</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>

@endsection