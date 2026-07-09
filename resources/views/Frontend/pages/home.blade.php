@extends('Frontend.layouts.master')

@section('title', 'Home')

@section('content')

    {{-- Hero --}}
    <section class="relative pt-28 pb-20 lg:pt-36 lg:pb-28 overflow-hidden bg-zinc-50 dark:bg-zinc-950">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -top-40 -right-40 w-[500px] h-[500px] rounded-full bg-indigo-500/10 blur-3xl"></div>
            <div class="absolute -bottom-40 -left-40 w-[400px] h-[400px] rounded-full bg-violet-500/10 blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(#d4d4d8_1px,transparent_1px)] dark:bg-[radial-gradient(#27272a_1px,transparent_1px)] [background-size:28px_28px] opacity-60"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-14 lg:gap-16 items-center">
                <div data-aos="fade-right">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-indigo-50 dark:bg-indigo-950/50 border border-indigo-100 dark:border-indigo-900/50 mb-6">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        <span class="text-[11px] uppercase tracking-widest font-bold text-indigo-600 dark:text-indigo-400">
                            Laravel {{ app()->version() }} &bull; Ready to deploy
                        </span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-zinc-900 dark:text-white leading-[1.1] mb-6">
                        Build faster with a
                        <span class="bg-gradient-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent">secure starter</span>
                    </h1>

                    <p class="text-lg text-zinc-600 dark:text-zinc-400 leading-relaxed mb-8 max-w-lg">
                        Skip weeks of boilerplate. This starter ships with role-based access control,
                        immutable activity logs, and a polished admin dashboard — so you can focus on your product.
                    </p>

                    <div class="flex flex-wrap gap-4 mb-10">
                        @guest
                            <a href="{{ route('register') }}"
                                class="inline-flex items-center gap-2 px-7 py-3.5 bg-indigo-600 text-white rounded-xl font-bold shadow-xl shadow-indigo-600/25 hover:bg-indigo-700 hover:-translate-y-0.5 transition-all">
                                Start Building
                                <i class="fa-solid fa-arrow-right text-sm"></i>
                            </a>
                            <a href="{{ route('login') }}"
                                class="inline-flex items-center gap-2 px-7 py-3.5 bg-white dark:bg-zinc-900 text-zinc-900 dark:text-white border border-zinc-200 dark:border-zinc-700 rounded-xl font-bold hover:bg-zinc-50 dark:hover:bg-zinc-800 transition-all">
                                Sign In
                            </a>
                        @else
                            <a href="{{ route('dashboard.index') }}"
                                class="inline-flex items-center gap-2 px-7 py-3.5 bg-indigo-600 text-white rounded-xl font-bold shadow-xl shadow-indigo-600/25 hover:bg-indigo-700 hover:-translate-y-0.5 transition-all">
                                Open Dashboard
                                <i class="fa-solid fa-arrow-right text-sm"></i>
                            </a>
                        @endguest
                    </div>

                    <div class="flex flex-wrap gap-6 text-sm text-zinc-500 dark:text-zinc-400">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-emerald-500"></i> RBAC included</span>
                        <span class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-emerald-500"></i> Activity audit trail</span>
                        <span class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-emerald-500"></i> Auth ready</span>
                    </div>
                </div>

                {{-- Dashboard preview card --}}
                <div class="relative" data-aos="fade-left" data-aos-delay="150">
                    <div class="absolute -inset-4 bg-gradient-to-r from-indigo-500 to-violet-500 rounded-3xl blur-2xl opacity-20"></div>
                    <div class="relative bg-zinc-900 rounded-2xl shadow-2xl overflow-hidden border border-zinc-800">
                        <div class="flex items-center gap-2 px-4 py-3 bg-zinc-800/80 border-b border-zinc-700">
                            <span class="w-3 h-3 rounded-full bg-red-500"></span>
                            <span class="w-3 h-3 rounded-full bg-amber-500"></span>
                            <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                            <span class="ml-3 text-xs text-zinc-500 font-mono">admin/dashboard</span>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-xs text-zinc-500 uppercase tracking-wider font-semibold">Welcome back</p>
                                    <p class="text-white font-bold text-lg mt-0.5">{{ auth()->user()->name ?? 'Admin User' }}</p>
                                </div>
                                <span class="px-2.5 py-1 rounded-md bg-emerald-500/10 text-emerald-400 text-xs font-bold border border-emerald-500/20">Online</span>
                            </div>
                            <div class="grid grid-cols-3 gap-3">
                                <div class="bg-zinc-800/60 rounded-xl p-3 border border-zinc-700/50">
                                    <p class="text-[10px] text-zinc-500 uppercase font-bold">Users</p>
                                    <p class="text-xl font-black text-white mt-1">128</p>
                                </div>
                                <div class="bg-zinc-800/60 rounded-xl p-3 border border-zinc-700/50">
                                    <p class="text-[10px] text-zinc-500 uppercase font-bold">Roles</p>
                                    <p class="text-xl font-black text-white mt-1">6</p>
                                </div>
                                <div class="bg-zinc-800/60 rounded-xl p-3 border border-zinc-700/50">
                                    <p class="text-[10px] text-zinc-500 uppercase font-bold">Logs</p>
                                    <p class="text-xl font-black text-white mt-1">2.4k</p>
                                </div>
                            </div>
                            <div class="bg-zinc-800/40 rounded-xl p-4 border border-zinc-700/50">
                                <p class="text-xs text-zinc-500 font-semibold mb-3">Recent Activity</p>
                                <div class="space-y-2.5">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-indigo-500 shrink-0"></span>
                                        <p class="text-xs text-zinc-400 font-mono">role.assigned &mdash; <span class="text-zinc-300">admin &rarr; editor</span></p>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0"></span>
                                        <p class="text-xs text-zinc-400 font-mono">user.created &mdash; <span class="text-zinc-300">jane@example.com</span></p>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-amber-500 shrink-0"></span>
                                        <p class="text-xs text-zinc-400 font-mono">auth.login &mdash; <span class="text-zinc-300">session started</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features --}}
    <section id="features" class="py-20 lg:py-28 bg-white dark:bg-zinc-900">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16" data-aos="fade-up">
                <p class="text-xs font-bold uppercase tracking-widest text-indigo-600 dark:text-indigo-400 mb-3">Features</p>
                <h2 class="text-3xl sm:text-4xl font-black text-zinc-900 dark:text-white tracking-tight mb-4">
                    Everything you need to launch
                </h2>
                <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed">
                    Pre-configured modules and best practices so your team ships with confidence from day one.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $features = [
                        ['icon' => 'fa-shield-halved', 'bg' => 'bg-indigo-100 dark:bg-indigo-950/50', 'icon_color' => 'text-indigo-600 dark:text-indigo-400', 'title' => 'Role-Based Access', 'desc' => 'Granular permissions with Spatie — assign roles and control who sees what.'],
                        ['icon' => 'fa-clock-rotate-left', 'bg' => 'bg-violet-100 dark:bg-violet-950/50', 'icon_color' => 'text-violet-600 dark:text-violet-400', 'title' => 'Activity Logging', 'desc' => 'Immutable audit trail for every critical action across your application.'],
                        ['icon' => 'fa-user-lock', 'bg' => 'bg-emerald-100 dark:bg-emerald-950/50', 'icon_color' => 'text-emerald-600 dark:text-emerald-400', 'title' => 'Authentication', 'desc' => 'Laravel Breeze auth flows — login, register, password reset, and email verification.'],
                        ['icon' => 'fa-users-gear', 'bg' => 'bg-amber-100 dark:bg-amber-950/50', 'icon_color' => 'text-amber-600 dark:text-amber-400', 'title' => 'User Management', 'desc' => 'Full CRUD for users with profile support and role assignment built in.'],
                        ['icon' => 'fa-gauge-high', 'bg' => 'bg-sky-100 dark:bg-sky-950/50', 'icon_color' => 'text-sky-600 dark:text-sky-400', 'title' => 'Admin Dashboard', 'desc' => 'Clean, responsive admin panel to manage your entire application at a glance.'],
                        ['icon' => 'fa-bolt', 'bg' => 'bg-rose-100 dark:bg-rose-950/50', 'icon_color' => 'text-rose-600 dark:text-rose-400', 'title' => 'Modern Stack', 'desc' => 'Laravel 12, PHP 8.2+, Tailwind CSS — fast, typed, and developer-friendly.'],
                    ];
                @endphp

                @foreach ($features as $i => $feature)
                    <div data-aos="fade-up" data-aos-delay="{{ $i * 80 }}"
                        class="group p-6 rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-zinc-50 dark:bg-zinc-950 hover:border-indigo-200 dark:hover:border-indigo-800 hover:shadow-lg hover:shadow-indigo-500/5 transition-all duration-300">
                        <div class="w-11 h-11 rounded-xl {{ $feature['bg'] }} flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <i class="fa-solid {{ $feature['icon'] }} {{ $feature['icon_color'] }}"></i>
                        </div>
                        <h3 class="font-bold text-zinc-900 dark:text-white mb-2">{{ $feature['title'] }}</h3>
                        <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">{{ $feature['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Tech Stack --}}
    <section id="stack" class="py-20 bg-zinc-50 dark:bg-zinc-950 border-y border-zinc-200 dark:border-zinc-800">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12" data-aos="fade-up">
                <p class="text-xs font-bold uppercase tracking-widest text-indigo-600 dark:text-indigo-400 mb-3">Tech Stack</p>
                <h2 class="text-3xl font-black text-zinc-900 dark:text-white tracking-tight">Battle-tested tools</h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4" data-aos="fade-up" data-aos-delay="100">
                @php
                    $stack = [
                        ['icon' => 'fa-brands fa-laravel', 'label' => 'Laravel', 'sub' => app()->version(), 'color' => 'text-red-500'],
                        ['icon' => 'fa-brands fa-php', 'label' => 'PHP', 'sub' => '8.2+ JIT', 'color' => 'text-indigo-500'],
                        ['icon' => 'fa-solid fa-database', 'label' => 'Eloquent', 'sub' => 'ORM', 'color' => 'text-amber-500'],
                        ['icon' => 'fa-brands fa-css3-alt', 'label' => 'Tailwind', 'sub' => 'CSS', 'color' => 'text-sky-500'],
                    ];
                @endphp

                @foreach ($stack as $item)
                    <div class="flex flex-col items-center p-6 rounded-2xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-indigo-200 dark:hover:border-indigo-800 transition-colors">
                        <i class="{{ $item['icon'] }} {{ $item['color'] }} text-3xl mb-3"></i>
                        <span class="font-bold text-zinc-900 dark:text-white text-sm">{{ $item['label'] }}</span>
                        <span class="text-xs text-zinc-500 mt-0.5">{{ $item['sub'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section id="get-started" class="py-20 lg:py-28 bg-white dark:bg-zinc-900">
        <div class="max-w-4xl mx-auto px-6 text-center" data-aos="zoom-in">
            <div class="relative rounded-3xl overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 via-violet-600 to-indigo-800"></div>
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
                <div class="relative px-8 py-14 sm:px-16 sm:py-16">
                    <h2 class="text-3xl sm:text-4xl font-black text-white tracking-tight mb-4">
                        Ready to get started?
                    </h2>
                    <p class="text-indigo-100 text-lg mb-8 max-w-lg mx-auto">
                        Create your account and explore the full admin panel in minutes.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        @guest
                            <a href="{{ route('register') }}"
                                class="inline-flex items-center gap-2 px-8 py-3.5 bg-white text-indigo-700 rounded-xl font-bold hover:bg-indigo-50 shadow-lg transition-all">
                                Create Account
                                <i class="fa-solid fa-arrow-right text-sm"></i>
                            </a>
                            <a href="{{ route('login') }}"
                                class="inline-flex items-center gap-2 px-8 py-3.5 bg-white/10 text-white border border-white/25 rounded-xl font-bold hover:bg-white/20 transition-all">
                                Sign In
                            </a>
                        @else
                            <a href="{{ route('dashboard.index') }}"
                                class="inline-flex items-center gap-2 px-8 py-3.5 bg-white text-indigo-700 rounded-xl font-bold hover:bg-indigo-50 shadow-lg transition-all">
                                Go to Dashboard
                                <i class="fa-solid fa-arrow-right text-sm"></i>
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
