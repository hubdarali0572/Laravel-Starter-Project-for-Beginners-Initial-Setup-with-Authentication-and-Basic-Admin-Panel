@extends('Frontend.layouts.master')

@section('title', 'About Us')

@section('content')
    <section class="relative pt-28 pb-16 bg-zinc-50 dark:bg-zinc-950 overflow-hidden">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -top-28 -right-20 w-[360px] h-[360px] rounded-full bg-indigo-500/10 blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(#d4d4d8_1px,transparent_1px)] dark:bg-[radial-gradient(#27272a_1px,transparent_1px)] [background-size:28px_28px] opacity-50"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-6">
            <div class="max-w-3xl">
                <span class="inline-flex items-center px-3 py-1 text-xs font-bold uppercase tracking-widest rounded-full bg-indigo-50 text-indigo-600 dark:bg-indigo-950/50 dark:text-indigo-300 border border-indigo-100 dark:border-indigo-900/50">
                    About Our Platform
                </span>
                <h1 class="mt-5 text-4xl sm:text-5xl font-black tracking-tight text-zinc-900 dark:text-white leading-tight">
                    We build reliable foundations for modern web products.
                </h1>
                <p class="mt-6 text-lg text-zinc-600 dark:text-zinc-400 leading-relaxed">
                    Our mission is to help teams launch faster with a secure, scalable starter framework that already
                    includes authentication, role-based access control, and activity monitoring.
                </p>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white dark:bg-zinc-900">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-3 gap-6">
            <div class="rounded-2xl border border-zinc-200 dark:border-zinc-800 p-6 bg-zinc-50 dark:bg-zinc-950">
                <h3 class="text-lg font-bold text-zinc-900 dark:text-white">Our Vision</h3>
                <p class="mt-3 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                    Empower developers and organizations with production-ready architecture that balances speed, security,
                    and maintainability.
                </p>
            </div>
            <div class="rounded-2xl border border-zinc-200 dark:border-zinc-800 p-6 bg-zinc-50 dark:bg-zinc-950">
                <h3 class="text-lg font-bold text-zinc-900 dark:text-white">Our Approach</h3>
                <p class="mt-3 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                    We follow practical best practices: modular design, clear role boundaries, transparent audit history,
                    and modern UI systems.
                </p>
            </div>
            <div class="rounded-2xl border border-zinc-200 dark:border-zinc-800 p-6 bg-zinc-50 dark:bg-zinc-950">
                <h3 class="text-lg font-bold text-zinc-900 dark:text-white">Our Promise</h3>
                <p class="mt-3 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                    Deliver maintainable code and professional interfaces that scale as your application and team grow.
                </p>
            </div>
        </div>
    </section>

    <section class="py-16 bg-zinc-50 dark:bg-zinc-950 border-y border-zinc-200 dark:border-zinc-800">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="rounded-2xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-6">
                    <p class="text-xs uppercase tracking-widest text-zinc-400 font-bold">Framework</p>
                    <p class="mt-2 text-xl font-black text-zinc-900 dark:text-white">Laravel {{ app()->version() }}</p>
                </div>
                <div class="rounded-2xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-6">
                    <p class="text-xs uppercase tracking-widest text-zinc-400 font-bold">Security</p>
                    <p class="mt-2 text-xl font-black text-zinc-900 dark:text-white">RBAC Enabled</p>
                </div>
                <div class="rounded-2xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-6">
                    <p class="text-xs uppercase tracking-widest text-zinc-400 font-bold">Transparency</p>
                    <p class="mt-2 text-xl font-black text-zinc-900 dark:text-white">Audit Logging</p>
                </div>
                <div class="rounded-2xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-6">
                    <p class="text-xs uppercase tracking-widest text-zinc-400 font-bold">Runtime</p>
                    <p class="mt-2 text-xl font-black text-zinc-900 dark:text-white">PHP 8.2+</p>
                </div>
            </div>
        </div>
    </section>
@endsection
