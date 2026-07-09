<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email | Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-indigo-900 flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">
        <div class="flex flex-col items-center mb-6">
            <span class="flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-600 text-white text-xl shadow-lg shadow-indigo-600/30 mb-4">
                <i class="fas fa-envelope-circle-check"></i>
            </span>
            <h1 class="text-xl font-bold text-slate-900">Verify Your Email</h1>
            <p class="text-sm text-slate-500 text-center mt-2">
                Thanks for signing up! Please verify your email by clicking the link we sent you.
                Didn't get it? We'll gladly send another.
            </p>
        </div>

        @if (session('status') === 'verification-link-sent')
            <div class="mb-4 text-sm text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-lg px-4 py-2.5">
                A new verification link has been sent to your email address.
            </div>
        @endif

        <div class="space-y-3">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2.5 rounded-lg font-semibold hover:bg-indigo-700 shadow-lg shadow-indigo-600/25 transition">
                    Resend Verification Email
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full border border-slate-300 text-slate-600 py-2.5 rounded-lg font-semibold hover:bg-slate-50 transition">
                    Log Out
                </button>
            </form>
        </div>

        <div class="text-center pt-5">
            <a href="{{ url('/') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-700 hover:underline">
                <i class="fas fa-arrow-left mr-1 text-xs"></i> Back to Website
            </a>
        </div>
    </div>

</body>

</html>
