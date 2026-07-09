<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-indigo-900 flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">
        <div class="flex flex-col items-center mb-6">
            <span class="flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-600 text-white text-xl shadow-lg shadow-indigo-600/30 mb-4">
                <i class="fas fa-key"></i>
            </span>
            <h1 class="text-xl font-bold text-slate-900">Forgot Password?</h1>
            <p class="text-sm text-slate-500 text-center mt-2">
                Enter your email and we'll send you a reset link.
            </p>
        </div>

        @if (session('status'))
            <div class="mb-4 text-sm text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-lg px-4 py-2.5">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
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

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2.5 rounded-lg font-semibold hover:bg-indigo-700 shadow-lg shadow-indigo-600/25 transition">
                Email Password Reset Link
            </button>

            <div class="text-center">
                <a href="{{ route('login') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-700 hover:underline">
                    <i class="fas fa-arrow-left mr-1 text-xs"></i> Back to Login
                </a>
            </div>
        </form>
    </div>

</body>

</html>
