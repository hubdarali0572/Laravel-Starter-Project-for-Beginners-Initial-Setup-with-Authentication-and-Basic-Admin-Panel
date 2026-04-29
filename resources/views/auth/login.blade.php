<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/others/logo.png') }}">

    <!-- Page Title -->
    <title>@yield('title')Task Management System</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center px-4">

    <div class="w-full max-w-md bg-white  shadow-lg p-8">

        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/images/others/logo.png') }}" alt="Finance Advisory Logo"
                class="h-[120px] object-contain">
        </div>

        <!-- Heading -->
        <h1 class="text-2xl font-semibold text-center text-gray-800 mb-8">
            Login to Your Account
        </h1>

        <form method="POST" action="{{ route('login') }}" class="space-y-5" id="loginForm">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email Address
                </label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    placeholder="you@example.com"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="relative">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <input type="password" id="password" name="password" required placeholder="Enter your password"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 pr-10 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">

                <i id="togglePassword"
                    class="fa-solid fa-eye absolute right-3 top-9 text-gray-500 cursor-pointer hover:text-gray-700"
                    onclick="togglePassword()"></i>

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-slate-600">
                    <span class="ml-2">Keep me signed in</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-yellow-600 hover:underline">
                        Forgot Password?
                    </a>
                @endif

            </div>

            <!-- Buttons -->
            <div class="grid grid-cols-1 gap-3 pt-2">
                <button type="submit" id="submitBtn"
                    class="w-full bg-blue-600 text-white py-2 font-semibold hover:bg-blue-500 transition flex items-center justify-center">

                    <span id="btnText">Log In</span>
                </button>
            </div>

        </form>
    </div>

    <!-- Toggle Password Script -->
    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const icon = document.getElementById('togglePasswordIcon');

            if (password.type === "password") {
                password.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                password.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
        document.getElementById('loginForm').addEventListener('submit', function () {
            const btn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');

            btn.disabled = true;

            // Show ONLY loader (no text)
            btnText.innerHTML = `
            <svg class="animate-spin h-5 w-5 text-white mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
            </svg>
        `;
        });
    </script>

</body>

</html>