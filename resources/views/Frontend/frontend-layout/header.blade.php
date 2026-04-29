<header class="bg-[#F7F4ED] shadow-lg fixed top-0 w-full z-50">
    <div class="max-w-[1500px] mx-auto flex justify-between items-center p-2 relative">

        <!-- Logo -->
        <a href=""><img src="{{ asset('assets/images/others/Logo.jpg') }}" alt="Logo" class="w-[70px] h-[70px]"></a>


        <!-- Menu Button -->
        <button id="menu-btn" class="lg:hidden text-dark focus:outline-none">
            <!-- Menu Icon -->
            <svg id="menu-icon" class="w-7 h-7 block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>

            <!-- Close Icon -->
            <svg id="close-icon" class="w-7 h-7 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Desktop Menu -->
        <nav class="hidden lg:flex">
            <ul class="flex items-center space-x-4 font-medium">
                <li><a href="#about" class="nav-link text-dark font-semibold hover:text-[#f59e0b] text-md">About</a>
                </li>
                <li><a href="#programs"
                        class="nav-link text-dark font-semibold hover:text-[#f59e0b] text-md">Programs</a></li>
                <li><a href="#facilities"
                        class="nav-link text-dark font-semibold hover:text-[#f59e0b] text-md">Facilities</a></li>
                <li><a href="#enrollment"
                        class="nav-link text-dark font-semibold hover:text-[#f59e0b] text-md">Enrollment</a></li>
                <li><a href="#testimonials"
                        class="nav-link text-dark font-semibold hover:text-[#f59e0b] text-md">Testimonials</a></li>
                <li><a href="#gallery" class="nav-link text-dark font-semibold hover:text-[#f59e0b] text-md">Gallery</a>
                </li>
                <li><a href="#contact" class="nav-link text-dark font-semibold text-md">Contact</a></li>
                <li>
                    <a href="{{ route('login') }}" class="ml-4 inline-flex items-center rounded-full bg-[#f59e0b] px-6 py-2 text-dark font-semibold
                      shadow-md hover:bg-[#d97706] hover:shadow-lg transition-all duration-300">
                        Login
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden overflow-hidden max-h-0 transition-all duration-500 bg-[#F7F4ED] px-6">
        <ul class="flex flex-col gap-4 py-4 font-medium">
            <li><a href="#about" class="nav-link text-dark font-semibold text-md hover:text-[#f59e0b]">About</a></li>
            <li><a href="#programs" class="nav-link text-dark font-semibold text-md hover:text-[#f59e0b]">Programs</a>
            </li>
            <li><a href="#facilities"
                    class="nav-link text-dark font-semibold text-md hover:text-[#f59e0b]">Facilities</a></li>
            <li><a href="#enrollment"
                    class="nav-link text-dark font-semibold text-md hover:text-[#f59e0b]">Enrollment</a></li>
            <li><a href="#testimonials"
                    class="nav-link text-dark font-semibold text-md hover:text-[#f59e0b]">Testimonials</a></li>
            <li><a href="#gallery" class="nav-link text-dark font-semibold text-md hover:text-[#f59e0b]">Gallery</a>
            </li>
            <li><a href="#contact" class="nav-link text-dark font-semibold text-md">Contact</a></li>
            <li>
                <a href="{{ route('login') }}" class="inline-flex items-center rounded-full bg-[#f59e0b] px-6 py-2 text-dark font-semibold
                      shadow-md hover:bg-[#d97706] hover:shadow-lg transition-all duration-300">
                    Login
                </a>
            </li>
        </ul>
    </div>
</header>