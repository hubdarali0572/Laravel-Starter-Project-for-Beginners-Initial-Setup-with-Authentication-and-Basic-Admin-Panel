<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Trusted Solutions for Modern Businesses</title>

    <!-- AOS Jquery -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/others/busybeesfvicon.png') }}">

    <!-- Tailwind CSS CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- css -->
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

        .nav-link.active {
            color: #f59e0b;
            text-decoration: underline;
            text-underline-offset: 6px;
            text-decoration-thickness: 2px;
        }

    </style>

</head>

<body class="bg-gray-100 text-gray-800">

    @include('Frontend.frontend-layout.header')

    <main>
        @yield('content')
    </main>

    @include('Frontend.frontend-layout.footer')

    <!-- AOS Jquery -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>