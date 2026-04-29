<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>

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
        <h1 class="text-2xl font-semibold text-center text-gray-800 mb-6">
            Reset Password
        </h1>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
            @csrf

            <!-- Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email Address
                </label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $request->email) }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="you@example.com"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2
                           focus:border-blue-500 focus:ring-2 focus:ring-blue-200
                           outline-none transition"
                >
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- New Password -->
            <div class="relative">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    New Password
                </label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Enter new password"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 pr-10
                           focus:border-blue-500 focus:ring-2 focus:ring-blue-200
                           outline-none transition"
                >
                <i
                    class="fa-solid fa-eye absolute right-3 top-9 text-gray-500 cursor-pointer hover:text-gray-700"
                    onclick="togglePassword('password', this)"
                ></i>

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="relative">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Confirm Password
                </label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Confirm new password"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 pr-10
                           focus:border-blue-500 focus:ring-2 focus:ring-blue-200
                           outline-none transition"
                >
                <i
                    class="fa-solid fa-eye absolute right-3 top-9 text-gray-500 cursor-pointer hover:text-gray-700"
                    onclick="togglePassword('password_confirmation', this)"
                ></i>

                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <button
                type="submit"
                class="w-full bg-slate-400 text-white py-2 font-semibold
                       hover:bg-slate-500 transition"
            >
                Reset Password
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

    <!-- Toggle Password Script -->
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
