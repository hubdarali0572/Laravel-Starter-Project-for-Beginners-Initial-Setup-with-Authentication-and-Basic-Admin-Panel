<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home') | Trusted Solutions for Modern Businesses</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/others/busybeesfvicon.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>

    <style>
        html {
            overflow-x: hidden;
            overflow-y: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
            font-family: 'Inter', sans-serif;
        }

        html::-webkit-scrollbar {
            width: 0;
            height: 0;
        }

        body {
            overflow-x: hidden;
            scroll-behavior: smooth;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-zinc-50 text-zinc-800 antialiased">
    @include('Frontend.partials.header')

    <main>
        @yield('content')
    </main>

    @include('Frontend.partials.footer')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @stack('scripts')
</body>

</html>
