<footer class="border-t border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-950">
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-indigo-600 text-white">
                        <i class="fa-solid fa-layer-group text-sm"></i>
                    </span>
                    <span class="font-bold text-zinc-900 dark:text-white">Laravel Starter</span>
                </div>
                <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed max-w-xs">
                    A production-ready foundation with authentication, roles, and activity logging built in.
                </p>
            </div>

            <div>
                <h4 class="text-xs font-bold uppercase tracking-widest text-zinc-400 mb-4">Pages</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Home</a></li>
                    <li><a href="{{ route('about') }}" class="text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Contact Us</a></li>
                    @guest
                        <li><a href="{{ route('login') }}" class="text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Sign In</a></li>
                        <li><a href="{{ route('register') }}" class="text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Register</a></li>
                    @else
                        <li><a href="{{ route('dashboard.index') }}" class="text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Dashboard</a></li>
                    @endguest
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-bold uppercase tracking-widest text-zinc-400 mb-4">Built With</h4>
                <ul class="space-y-2 text-sm text-zinc-600 dark:text-zinc-400">
                    <li class="flex items-center gap-2"><i class="fa-brands fa-laravel text-red-500 w-4"></i> Laravel {{ app()->version() }}</li>
                    <li class="flex items-center gap-2"><i class="fa-brands fa-php text-indigo-500 w-4"></i> PHP 8.2+</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-shield-halved text-emerald-500 w-4"></i> Spatie Permissions</li>
                </ul>
            </div>
        </div>

        <div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-800 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-xs text-zinc-400">&copy; {{ date('Y') }} Laravel Starter. All rights reserved.</p>
            <p class="text-xs text-zinc-400">Crafted for modern web applications</p>
        </div>
    </div>
</footer>
