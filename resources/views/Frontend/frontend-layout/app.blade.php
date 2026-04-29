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

        /* scroller card testimonal */
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-marquee {
            animation: marquee 20s linear infinite;
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
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const counters = document.querySelectorAll(".counter");

            const options = {
                threshold: 0.5
            };

            const startCounter = (counter) => {
                const target = +counter.getAttribute("data-target");
                let count = 0;
                const increment = target / 1000; // Adjust speed: higher number = slower

                const updateCounter = () => {
                    count += increment;
                    if (count < target) {
                        counter.innerText = Math.ceil(count) + "+";
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.innerText = target + "+";
                    }
                };

                updateCounter();
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        startCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, options);

            counters.forEach(counter => {
                observer.observe(counter);
            });
        });
    </script>

    <!-- JS -->
    <script>
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');
        const menuLinks = menu.querySelectorAll('a');

        btn.addEventListener('click', () => {
            const isOpen = menu.classList.contains('max-h-[400px]');

            if (isOpen) {
                menu.classList.remove('max-h-[400px]');
                menu.classList.add('max-h-0');

                closeIcon.classList.add('hidden');
                menuIcon.classList.remove('hidden');
            } else {
                menu.classList.remove('max-h-0');
                menu.classList.add('max-h-[400px]');

                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            }
        });
        menuLinks.forEach(link => {
            link.addEventListener('click', () => {
                menu.classList.remove('max-h-[400px]');
                menu.classList.add('max-h-0');

                closeIcon.classList.add('hidden');
                menuIcon.classList.remove('hidden');
            });
        });
    </script>

    <script>
        const sections = document.querySelectorAll("section");
        const navLinks = document.querySelectorAll(".nav-link");
        // Smooth scroll
        navLinks.forEach(link => {
            link.addEventListener("click", e => {
                e.preventDefault();
                const target = document.querySelector(link.getAttribute("href"));
                target.scrollIntoView({ behavior: "smooth" });
            });
        });

        // Active link on scroll
        window.addEventListener("scroll", () => {
            let current = "";
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 80; // offset for fixed nav
                if (pageYOffset >= sectionTop) {
                    current = section.getAttribute("id");
                }
            });

            navLinks.forEach(link => {
                link.classList.remove("active");
                if (link.getAttribute("href") === "#" + current) {
                    link.classList.add("active");
                }
            });
        });
    </script>

</body>

</html>