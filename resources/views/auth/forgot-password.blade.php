<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center px-4">

    <div class="w-full max-w-md bg-white shadow-lg p-8">

        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/images/others/anzway-logo.png') }}"
                 alt="Finance Advisory Logo"
                 class="h-16 object-contain">
        </div>

        <!-- Heading -->
        <h1 class="text-2xl font-semibold text-center text-gray-800 mb-4">
            Forgot Password
        </h1>

        <!-- Description -->
        <p class="text-sm text-gray-600 text-center mb-6">
            Forgot your password? No problem. Just enter your email address and we’ll
            send you a password reset link.
        </p>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-sm text-green-600 bg-green-50 border border-green-200 rounded-lg px-4 py-2">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email Address
                </label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    placeholder="you@example.com"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2
                           focus:border-blue-500 focus:ring-2 focus:ring-blue-200
                           outline-none transition"
                >
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button -->
            <button
                type="submit"
                class="w-full bg-slate-400 text-white py-2 font-semibold
                       hover:bg-slate-500 transition"
            >
                Email Password Reset Link
            </button>

            <!-- Back to Login -->
            <div class="text-center pt-4">
                <a href="{{ route('login') }}"
                   class="text-sm text-blue-600 hover:text-blue-800 transition hover:underline">
                    ← Back to Login
                </a>
            </div>

        </form>
    </div>

</body>
</html>
