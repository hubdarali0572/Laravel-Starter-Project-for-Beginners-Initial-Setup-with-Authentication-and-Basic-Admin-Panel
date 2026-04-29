<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>

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
            Verify Your Email
        </h1>

        <!-- Message -->
        <p class="text-sm text-gray-600 text-center mb-6">
            Thanks for signing up! Before getting started, please verify your email
            address by clicking on the link we just emailed to you.
            If you didn’t receive the email, we’ll gladly send you another.
        </p>

        <!-- Status Message -->
        @if (session('status') === 'verification-link-sent')
            <div class="mb-4 text-sm text-green-600 bg-green-50 border border-green-200 px-4 py-2">
                A new verification link has been sent to your email address.
            </div>
        @endif

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-3 mt-6">
            
            <!-- Resend Verification -->
            <form method="POST" action="{{ route('verification.send') }}" class="w-full">
                @csrf
                <button
                    type="submit"
                    class="w-full bg-slate-400 text-white py-2 font-semibold
                           hover:bg-slate-500 transition"
                >
                    Resend Verification Email
                </button>
            </form>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button
                    type="submit"
                    class="w-full border border-slate-600 text-slate-600 py-2 font-semibold
                           hover:bg-slate-50 transition"
                >
                    Log Out
                </button>
            </form>
        </div>

        <!-- Back Link -->
        <div class="text-center pt-4">
            <a href="{{ url('/') }}"
               class="text-sm text-blue-600 hover:text-blue-800 transition hover:underline">
                ← Back to Website
            </a>
        </div>

    </div>

</body>
</html>
