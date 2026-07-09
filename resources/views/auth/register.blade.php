<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/others/busybeesfvicon.png') }}">
    <title>Create Account | Admin Panel</title>

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
                <h2 class="text-3xl font-bold leading-tight mb-4">Get started in minutes</h2>
                <p class="text-slate-300 text-sm leading-relaxed">
                    Create your account to access a secure, professional admin dashboard built for modern teams.
                </p>
                <div class="mt-8 space-y-3">
                    <div class="flex items-center gap-3 text-sm text-slate-300">
                        <i class="fas fa-circle-check text-emerald-400"></i> Quick and easy setup
                    </div>
                    <div class="flex items-center gap-3 text-sm text-slate-300">
                        <i class="fas fa-circle-check text-emerald-400"></i> Powerful user management
                    </div>
                    <div class="flex items-center gap-3 text-sm text-slate-300">
                        <i class="fas fa-circle-check text-emerald-400"></i> Secure by default
                    </div>
                </div>
            </div>

            <a href="{{ url('/') }}" class="relative z-10 text-xs text-slate-400 hover:text-slate-200 transition">
                <i class="fas fa-arrow-left mr-1"></i> Back to website
            </a>
        </div>

        <!-- Form panel -->
        <div class="p-8 sm:p-10 flex flex-col justify-center">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-slate-900 mb-1">Create your account</h1>
                <p class="text-sm text-slate-500">Fill in your details to get started.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Full Name</label>
                    <div class="relative">
                        <i class="fas fa-user absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus
                            placeholder="Enter your full name"
                            class="w-full rounded-lg border border-slate-300 pl-10 pr-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 outline-none transition">
                    </div>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Email</label>
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                        <input type="text" id="email" name="email" value="{{ old('email') }}" required
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
                        <input type="password" id="password" name="password" required placeholder="Create a password"
                            class="w-full rounded-lg border border-slate-300 pl-10 pr-10 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 outline-none transition">
                        <i class="fa-solid fa-eye absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 cursor-pointer hover:text-slate-600 text-sm"
                            onclick="togglePassword('password', this)"></i>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Confirm Password</label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            placeholder="Confirm your password"
                            class="w-full rounded-lg border border-slate-300 pl-10 pr-10 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 outline-none transition">
                        <i class="fa-solid fa-eye absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 cursor-pointer hover:text-slate-600 text-sm"
                            onclick="togglePassword('password_confirmation', this)"></i>
                    </div>
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <label class="flex items-start gap-2 text-sm text-slate-600">
                    <input type="checkbox" name="remember" class="mt-0.5 rounded border-slate-300 text-indigo-600 focus:ring-indigo-200">
                    <span>I agree to the <a href="#" class="font-medium text-indigo-600 hover:underline">Privacy Policy</a></span>
                </label>

                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2.5 rounded-lg font-semibold hover:bg-indigo-700 shadow-lg shadow-indigo-600/25 transition">
                    Create Account
                </button>

                <p class="text-center text-sm text-slate-500">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:text-indigo-700 hover:underline">Sign in</a>
                </p>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(fieldId, icon) {
            const input = document.getElementById(fieldId);
            if (input.type === "password") {
                input.type = "text";
                icon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.replace("fa-eye-slash", "fa-eye");
            }
        }
    </script>

</body>

</html>
