<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('assets/images/others/busybeesfvicon.png') }}">

  <!-- Page Title -->
  <title>@yield('title')Trusted by families who want the best for their children.</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center px-4">

    <div class="w-full max-w-md bg-white shadow-lg p-8">

        <!-- Logo -->
        <div class="flex justify-center mb-6">
          <img src="{{ asset('assets/images/others/busybeesfvicon.png') }}" alt="Finance Advisory Logo"  class="h-[120px] object-contain">
        </div>

        <!-- Heading -->
        <h1 class="text-2xl font-semibold text-center text-gray-800 mb-8">
            Create Your Account
        </h1>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Full Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Full Name
                </label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    placeholder="Enter your full name"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 outline-none transition"
                >
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email / Phone -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email 
                </label>
                <input
                    type="text"
                     id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    placeholder="Email"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 outline-none transition"
                >
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="relative">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <input  type="password"
                    id="password"
                    name="password"
                    required
                    placeholder="Create a password"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 pr-10 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 outline-none transition"
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
                    placeholder="Confirm your password"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 pr-10 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 outline-none transition"
                >
                <i
                    class="fa-solid fa-eye absolute right-3 top-9 text-gray-500 cursor-pointer hover:text-gray-700"
                    onclick="togglePassword('password_confirmation', this)"
                ></i>

                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Privacy Policy -->
            <div class="flex items-start gap-2">
                <input type="checkbox" name="remember"
                       class="mt-1 rounded border-gray-300 text-slate-600">
                <p class="text-sm text-gray-600">
                    I agree to the
                    <a href="#" class="text-yellow-600 hover:underline">
                        Privacy Policy
                    </a>
                </p>
            </div>

            <!-- Buttons -->
            <div class="grid grid-cols-2 gap-3 pt-2">
                <button
                    type="submit"
                    class="w-full bg-slate-400 text-white py-2 font-semibold hover:bg-slate-500 transition"
                >
                    Register
                </button>

                <a
                    href="{{ route('login') }}"
                    class="w-full border border-slate-600 text-slate-600 py-2 font-semibold text-center hover:bg-slate-50 transition"
                >
                    Log In
                </a>
            </div>

            <!-- Back Link -->
            <div class="text-center pt-4">
                <a href="{{ url('/') }}"
                   class="text-sm text-yellow-600 hover:text-yellow-700 transition hover:underline">
                    ← Back to Website
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
