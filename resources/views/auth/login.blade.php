<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/others/logo.png') }}">
    <title>Sign In | Admin Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="min-h-screen bg-slate-100 flex items-center justify-center p-4">

    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl shadow-slate-300/40 overflow-hidden grid lg:grid-cols-2">

        <!-- Brand panel -->
        <div class="relative hidden lg:flex flex-col justify-between p-10 bg-gradient-to-br from-slate-900 via-slate-800 to-indigo-900 text-white overflow-hidden">
            <div class="absolute -top-16 -right-16 w-64 h-64 rounded-full bg-indigo-500/20 blur-3xl"></div>
            <div class="absolute -bottom-20 -left-10 w-56 h-56 rounded-full bg-violet-500/20 blur-3xl"></div>

            <div class="relative z-10">
                <div class="flex items-center gap-3">
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-600 text-white shadow-lg shadow-indigo-600/30">
                        <i class="fas fa-layer-group"></i>
                    </span>
                    <span class="text-lg font-bold tracking-tight">Admin<span class="text-indigo-400 font-normal">Panel</span></span>
                </div>
            </div>

            <div class="relative z-10">
                <h2 class="text-3xl font-bold leading-tight mb-4">Welcome back to your workspace</h2>
                <p class="text-slate-300 text-sm leading-relaxed">
                    Securely manage users, roles, and monitor activity from one professional dashboard.
                </p>
                <div class="mt-8 space-y-3">
                    <div class="flex items-center gap-3 text-sm text-slate-300">
                        <i class="fas fa-circle-check text-emerald-400"></i> Role-based access control
                    </div>
                    <div class="flex items-center gap-3 text-sm text-slate-300">
                        <i class="fas fa-circle-check text-emerald-400"></i> Full activity audit trail
                    </div>
                    <div class="flex items-center gap-3 text-sm text-slate-300">
                        <i class="fas fa-circle-check text-emerald-400"></i> Enterprise-grade security
                    </div>
                </div>
            </div>

            <p class="relative z-10 text-xs text-slate-400">&copy; {{ date('Y') }} Admin Panel. All rights reserved.</p>
        </div>

        <!-- Form panel -->
        <div class="p-8 sm:p-10 flex flex-col justify-center">
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-slate-900 mb-1">Sign in</h1>
                <p class="text-sm text-slate-500">Enter your credentials to access your account.</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-5" id="loginForm">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Email Address</label>
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                            placeholder="you@example.com"
                            class="w-full rounded-lg border border-slate-300 pl-10 pr-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 outline-none transition">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Password</label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                        <input type="password" id="password" name="password" required placeholder="Enter your password"
                            class="w-full rounded-lg border border-slate-300 pl-10 pr-10 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 outline-none transition">
                        <i id="togglePasswordIcon"
                            class="fa-solid fa-eye absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 cursor-pointer hover:text-slate-600 text-sm"
                            onclick="togglePassword()"></i>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center text-sm text-slate-600">
                        <input type="checkbox" name="remember" class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-200">
                        <span class="ml-2">Keep me signed in</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-700 hover:underline">
                            Forgot Password?
                        </a>
                    @endif
                </div>

                <button type="submit" id="submitBtn"
                    class="w-full bg-indigo-600 text-white py-2.5 rounded-lg font-semibold hover:bg-indigo-700 shadow-lg shadow-indigo-600/25 transition flex items-center justify-center">
                    <span id="btnText">Sign In</span>
                </button>

                <p class="text-center text-sm text-slate-500">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-700 hover:underline">Create one</a>
                </p>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const icon = document.getElementById('togglePasswordIcon');
            if (password.type === "password") {
                password.type = "text";
                icon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                password.type = "password";
                icon.classList.replace("fa-eye-slash", "fa-eye");
            }
        }
        document.getElementById('loginForm').addEventListener('submit', function () {
            const btn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            btn.disabled = true;
            btnText.innerHTML = `
                <svg class="animate-spin h-5 w-5 text-white mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                </svg>`;
        });
    </script>

</body>

</html>
