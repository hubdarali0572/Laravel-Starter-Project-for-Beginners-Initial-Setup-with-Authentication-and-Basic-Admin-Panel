@extends('Frontend.frontend-layout.app')

@section('content')

  <!-- Hero Section -->

  <section
    class="relative bg-cover bg-center min-h-[93vh] sm:min-h-screen bg-[url('assets/images/others/imagehero.png')]">

    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
      <div class="text-center text-white px-6 md:px-12 lg:px-24" data-aos="zoom-in-up" data-aos-duration="1200"
        data-aos-delay="300" data-aos-easing="ease-out-cubic">
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-7xl font-extrabold leading-snug md:leading-tight mb-4">
          Nurturing Little Minds, <br class="hidden md:block"> Creating Big Smiles
        </h1>
        <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-100 mb-8 max-w-3xl mx-auto">
          Trusted care, joyful learning, and a loving environment for every child.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
          <a href="#enrollment"
            class="w-56 bg-yellow-400 hover:bg-yellow-500 text-dark font-semibold py-2 rounded text-base sm:text-lg transition duration-300 text-center">
            Enroll Now
          </a>

          <a href="#contact"
            class="w-56 bg-transparent border border-white hover:bg-white hover:text-black text-dark font-semibold py-2 rounded text-base sm:text-lg transition duration-300 text-center">
            Schedule a Visit
          </a>

        </div>
      </div>
    </div>
  </section>

  {{-- About Section --}}

  <section id="about"
    class="relative py-10 md:py-24 bg-gradient-to-r from-yellow-50 via-white to-yellow-50 overflow-hidden">

    <!-- Decorative Stars (Matching previous circle effect) -->
    <div class="absolute -top-0 -left-0 w-48 h-48 opacity-20">
      <svg viewBox="0 0 24 24" class="w-full h-full text-yellow-300 fill-current">
        <polygon points="12,2 15,10 23,10 17,14 19,22 12,17 5,22 7,14 1,10 9,10" />
      </svg>
    </div>

    <div class="absolute -bottom-0 -right-0 w-48 h-48 opacity-15">
      <svg viewBox="0 0 24 24" class="w-full h-full text-yellow-400 fill-current">
        <polygon points="12,2 15,10 23,10 17,14 19,22 12,17 5,22 7,14 1,10 9,10" />
      </svg>
    </div>
    <div class="max-w-7xl lg:container mx-auto px-6 grid grid-cols-1 lg:grid-cols-1 xl:grid-cols-2 gap-12 items-center">

      <!-- Text and Features (left on large screens) -->
      <div class="order-2 lg:order-1 grid grid-cols-1 gap-10 max-w-6xl mx-auto" data-aos="zoom-in-up"
        data-aos-duration="1200" data-aos-delay="300" data-aos-easing="ease-out-cubic">
        <!-- Title and description -->
        <div class="space-y-6">
          <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800">
            About <span class="text-yellow-400">DayCare</span>
          </h2>
          <p class="text-gray-700 text-lg md:text-xl">
            We provide a safe, nurturing, and stimulating environment where children can learn, play, and grow.
            Our dedicated staff ensures each child feels valued and engaged every day.
          </p>
        </div>

        <!-- Features grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <!-- Feature 1 -->
          <div class="grid grid-cols-[auto_1fr] gap-3 items-start">
            <div class="p-3 bg-yellow-400 text-dark rounded-full shadow-lg">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
              </svg>
            </div>
            <div>
              <h3 class="text-gray-800 font-semibold">Safe & Secure Environment</h3>
              <p class="text-gray-600 text-sm">Child safety is our top priority with monitored spaces and protocols.</p>
            </div>
          </div>

          <!-- Feature 2 -->
          <div class="grid grid-cols-[auto_1fr] gap-3 items-start">
            <div class="p-3 bg-yellow-400 text-dark rounded-full shadow-lg">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
              </svg>
            </div>
            <div>
              <h3 class="text-gray-800 font-semibold">Engaging Learning Activities</h3>
              <p class="text-gray-600 text-sm">Fun, age-appropriate activities to boost creativity and social skills.</p>
            </div>
          </div>

          <!-- Feature 3 -->
          <div class="grid grid-cols-[auto_1fr] gap-3 items-start">
            <div class="p-3 bg-yellow-400 text-dark rounded-full shadow-lg">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 20h5v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2h5m4-16a4 4 0 100 8 4 4 0 000-8z" />
              </svg>
            </div>
            <div>
              <h3 class="text-gray-800 font-semibold">Experienced & Caring Staff</h3>
              <p class="text-gray-600 text-sm">Certified caregivers who nurture every child with attention and love.</p>
            </div>
          </div>

          <!-- Feature 4 -->
          <div class="grid grid-cols-[auto_1fr] gap-3 items-start">
            <div class="p-3 bg-yellow-400 text-dark rounded-full shadow-lg">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
            </div>
            <div>
              <h3 class="text-gray-800 font-semibold">Fun-filled Play & Exploration</h3>
              <p class="text-gray-600 text-sm">Play areas designed for physical activity, creativity, and discovery.</p>
            </div>
          </div>

          <!-- Feature 5 -->
          <div class="grid grid-cols-[auto_1fr] gap-3 items-start">
            <div class="p-3 bg-yellow-400 text-dark rounded-full shadow-lg">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4" />
              </svg>
            </div>
            <div>
              <h3 class="text-gray-800 font-semibold">Holistic Child Development</h3>
              <p class="text-gray-600 text-sm">Programs that focus on social, emotional, cognitive, and physical growth.
              </p>
            </div>
          </div>

          <!-- Feature 6 -->
          <div class="grid grid-cols-[auto_1fr] gap-3 items-start">
            <div class="p-3 bg-yellow-400 text-dark rounded-full shadow-lg">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4l3 10h4l3-10h4" />
              </svg>
            </div>
            <div>
              <h3 class="text-gray-800 font-semibold">Healthy Meals & Nutrition</h3>
              <p class="text-gray-600 text-sm">Balanced meals and snacks to support growth and wellness.</p>
            </div>
          </div>

          <!-- Feature 7 -->
          <div class="grid grid-cols-[auto_1fr] gap-3 items-start">
            <div class="p-3 bg-yellow-400 text-dark rounded-full shadow-lg">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </div>
            <div>
              <h3 class="text-gray-800 font-semibold">Clean & Hygienic Facilities</h3>
              <p class="text-gray-600 text-sm">Regularly sanitized classrooms, play areas, and learning tools.</p>
            </div>
          </div>

          <!-- Feature 8 -->
          <div class="grid grid-cols-[auto_1fr] gap-3 items-start">
            <div class="p-3 bg-yellow-400 text-dark rounded-full shadow-lg">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h10M7 16h10" />
              </svg>
            </div>
            <div>
              <h3 class="text-gray-800 font-semibold">Small Class Sizes</h3>
              <p class="text-gray-600 text-sm">Ensuring individual attention and personalized care for every child.</p>
            </div>
          </div>

          <!-- Feature 9 -->
          <div class="grid grid-cols-[auto_1fr] gap-3 items-start">
            <div class="p-3 bg-yellow-400 text-dark rounded-full shadow-lg">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
              </svg>
            </div>
            <div>
              <h3 class="text-gray-800 font-semibold">Parent Communication & Updates</h3>
              <p class="text-gray-600 text-sm">Regular updates, photos, and reports to keep parents informed.</p>
            </div>
          </div>

          <!-- Feature 10 -->
          <div class="grid grid-cols-[auto_1fr] gap-3 items-start">
            <div class="p-3 bg-yellow-400 text-dark rounded-full shadow-lg">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6l-2 6h4l-2 6" />
              </svg>
            </div>
            <div>
              <h3 class="text-gray-800 font-semibold">Inclusive & Positive Atmosphere</h3>
              <p class="text-gray-600 text-sm">Encouraging environment that celebrates diversity, kindness, and teamwork.
              </p>
            </div>
          </div>
        </div>
      </div>


      <!-- Image on right for large screens -->
      <div class="order-1 lg:order-2 w-full" data-aos="zoom-in-down" data-aos-duration="1200" data-aos-delay="300"
        data-aos-easing="ease-out-cubic">
        <img src="{{ asset('assets/images/others/hero3.png') }}" alt="Daycare"
          class="w-full max-w-6xl h-[300px] sm:h-[400px] md:h-[500px] lg:h-[600px] object-cover rounded-xl shadow-2xl mx-auto transition duration-500 hover:scale-105">
      </div>

    </div>
  </section>

  {{-- Programs Section --}}

  <section id="programs" class="py-12 md:py-24 bg-white">
    <div class="max-w-7xl lg:container mx-auto px-6">
      <div class="md:text-center mb-8 md:mb-6 relative">
        <div class="absolute -top-12 left-1/2 -translate-x-1/2 opacity-20 blur-3xl w-72 h-72 bg-yellow-400 rounded-full">
        </div>

        <span
          class="inline-block bg-yellow-100 text-yellow-700  px-6 py-2 rounded-full text-sm font-bold tracking-widest uppercase relative z-10">
          Our Programs
        </span>

        <h2 class="mt-4 text-3xl md:text-4xl font-black text-slate-900 relative z-10">
          Learning and Fun for Every Age
        </h2>

        <p class="text-slate-600 mt-4 max-w-2xl mx-auto text-lg">
          Explore our thoughtfully designed programs that nurture creativity, curiosity, and social skills. From toddlers
          to after-school care, every child benefits from engaging activities tailored to their age and development.
        </p>
      </div>


      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3  gap-4 p-0 md:p-2 lg:p-0 xl:p-4">
        <!-- 1. Toddler Program -->
        <div
          class="group relative bg-[#FFFBEB] p-2 md:p-3 rounded-[2rem] md:rounded-[2rem] border-2 border-dashed border-yellow-200 hover:border-yellow-400 transition-all duration-500">
          <div class="bg-white rounded-[2rem] md:rounded-[2rem] overflow-hidden shadow-sm h-full flex flex-col">
            <div class="relative overflow-hidden">
              <img src="{{ asset('assets/images/others/Early_Learning_Toddler_Program__50.png') }}"
                class="w-full h-64 md:h-80 object-cover rounded-b-[2rem] md:rounded-b-[2rem] group-hover:rounded-b-none transition-all duration-700"
                alt="Toddler Program">
              <!-- Responsive Age Tag -->
              <div
                class="absolute bottom-4 right-6 md:right-8 w-16 h-16 md:w-20 md:h-20 bg-yellow-400 rounded-full flex flex-col items-center justify-center border-4 border-white shadow-lg transform group-hover:scale-110 transition-transform">
                <span class="text-white text-[8px] md:text-[10px] font-bold uppercase">Ages</span>
                <span class="text-white text-sm md:text-sm font-black">0-18m</span>
              </div>
            </div>
            <div class="p-6 md:p-10 flex-grow">
              <div class="flex items-center gap-2 mb-2">
                <span class="w-6 md:w-8 h-1 bg-yellow-400 rounded-full"></span>
                <span class="text-yellow-600 font-bold text-[10px] md:text-xs uppercase tracking-widest">Early
                  Learning</span>
              </div>
              <h3 class="text-2xl md:text-3xl lg:text-3xl font-extrabold text-slate-800 mb-4 tracking-tight leading-none">
                Toddler<br>Program</h3>
              <p class="text-slate-600 text-base md:text-lg font-medium leading-snug">
                Building confidence through curiosity-led activities and social interaction.
              </p>
            </div>
          </div>
        </div>

        <!-- 2. After School Care -->
        <div
          class="group relative bg-[#FFFBEB] p-2 md:p-3 rounded-[2rem] md:rounded-[4rem] border-2 border-dashed border-yellow-200 hover:border-yellow-400 transition-all duration-500">
          <div class="bg-white rounded-[2rem] md:rounded-[2rem] overflow-hidden shadow-sm h-full flex flex-col">
            <div class="relative overflow-hidden">
              <img src="{{ asset('assets/images/others/School-Age_After_School_Care_50.png') }}"
                class="w-full h-64 md:h-80 object-cover rounded-b-[2rem] md:rounded-b-[2rem] group-hover:rounded-b-none transition-all duration-700"
                alt="After School Care">
              <div
                class="absolute bottom-4 right-6 md:right-8 w-16 h-16 md:w-20 md:h-20 bg-blue-400 rounded-full flex flex-col items-center justify-center border-4 border-white shadow-lg transform group-hover:scale-110 transition-transform">
                <span class="text-white text-[8px] md:text-[10px] font-bold uppercase">Ages</span>
                <span class="text-white  text-sm md:text-sm  font-black">18-3y</span>
              </div>
            </div>
            <div class="p-6 md:p-10 flex-grow">
              <div class="flex items-center gap-2 mb-2">
                <span class="w-6 md:w-8 h-1 bg-blue-400 rounded-full"></span>
                <span class="text-blue-600 font-bold text-[10px] md:text-xs uppercase tracking-widest">School-Age</span>
              </div>
              <h3
                class="text-2xl md:text-3xl lg:text-3xl  font-extrabold text-slate-800 mb-4 tracking-tight leading-none">
                After School<br>Care</h3>
              <p class="text-slate-600 text-base md:text-lg font-medium leading-snug">
                Supervised play, homework help, and enrichment activities for school-aged children.
              </p>
            </div>
          </div>
        </div>

        <!-- 3. Music & Art Program -->
        <div
          class="group relative bg-[#FFFBEB] p-2 md:p-3 rounded-[2rem] md:rounded-[2rem] border-2 border-dashed border-yellow-200 hover:border-yellow-400 transition-all duration-500">
          <div class="bg-white rounded-[2rem] md:rounded-[2rem] overflow-hidden shadow-sm h-full flex flex-col">
            <div class="relative overflow-hidden">
              <img src="{{ asset('assets/images/others/Creative_Arts_Music__Art_Program__2_50.png') }}"
                class="w-full h-64 md:h-80 object-cover rounded-b-[2rem] md:rounded-b-[2rem] group-hover:rounded-b-none transition-all duration-700"
                alt="Music & Art">
              <div
                class="absolute bottom-4 right-6 md:right-8 w-16 h-16 md:w-20 md:h-20 bg-pink-400 rounded-full flex flex-col items-center justify-center border-4 border-white shadow-lg transform group-hover:scale-110 transition-transform">
                <span class="text-white text-[8px] md:text-[10px] font-bold uppercase">Ages</span>
                <span class="text-white  text-sm md:text-sm  font-black">5-12y</span>
              </div>
            </div>
            <div class="p-6 md:p-10 flex-grow">
              <div class="flex items-center gap-2 mb-2">
                <span class="w-6 md:w-8 h-1 bg-pink-400 rounded-full"></span>
                <span class="text-pink-600 font-bold text-[10px] md:text-xs uppercase tracking-widest">Creative
                  Arts</span>
              </div>
              <h3 class="text-2xl md:text-3xl lg:text-3xl font-extrabold text-slate-800 mb-4 tracking-tight leading-none">
                Art<br>Programs</h3>
              <p class="text-slate-600 text-base md:text-lg font-medium leading-snug">
                Foster creativity and self-expression through music, painting, and fun crafts.
              </p>
            </div>
          </div>
        </div>

        <!-- 4. Language & Literacy -->
        <div
          class="group relative bg-[#FFFBEB] p-2 md:p-3 rounded-[2rem] md:rounded-[2rem] border-2 border-dashed border-yellow-200 hover:border-yellow-400 transition-all duration-500">
          <div class="bg-white rounded-[2rem] md:rounded-[2rem] overflow-hidden shadow-sm h-full flex flex-col">
            <div class="relative overflow-hidden">
              <img src="{{ asset('assets/images/others/Communication__3_50.png') }}"
                class="w-full h-64 md:h-80 object-cover rounded-b-[2rem] md:rounded-b-[2rem] group-hover:rounded-b-none transition-all duration-700"
                alt="Language & Literacy">
              <div
                class="absolute bottom-4 right-6 md:right-8 w-16 h-16 md:w-20 md:h-20 bg-green-400 rounded-full flex flex-col items-center justify-center border-4 border-white shadow-lg transform group-hover:scale-110 transition-transform">
                <span class="text-white text-[8px] md:text-[10px] font-bold uppercase">Ages</span>
                <span class="text-white text-sm md:text-sm font-black">12-13y</span>
              </div>
            </div>
            <div class="p-6 md:p-10 flex-grow">
              <div class="flex items-center gap-2 mb-2">
                <span class="w-6 md:w-8 h-1 bg-green-400 rounded-full"></span>
                <span
                  class="text-green-600 font-bold text-[10px] md:text-xs uppercase tracking-widest">Communication</span>
              </div>
              <h3 class="text-2xl md:text-3xl lg:text-3xl font-extrabold text-slate-800 mb-4 tracking-tight leading-none">
                Language &<br>Literacy</h3>
              <p class="text-slate-600 text-base md:text-lg font-medium leading-snug">
                Early reading, storytelling, and communication skills development for bright futures.
              </p>
            </div>
          </div>
        </div>

        <!-- 5. Physical Activity -->
        <div
          class="group relative bg-[#FFFBEB] p-2 md:p-3 rounded-[2rem] md:rounded-[2rem] border-2 border-dashed border-yellow-200 hover:border-yellow-400 transition-all duration-500">
          <div class="bg-white rounded-[2rem] md:rounded-[2rem] overflow-hidden shadow-sm h-full flex flex-col">
            <div class="relative overflow-hidden">
              <img src="{{ asset('assets/images/others/Health__Play_Physical_Activity_50.png') }}"
                class="w-full h-64 md:h-80 object-cover rounded-b-[2rem] md:rounded-b-[2rem] group-hover:rounded-b-none transition-all duration-700"
                alt="Physical Activity">
              <div
                class="absolute bottom-4 right-6 md:right-8 w-16 h-16 md:w-20 md:h-20 bg-orange-400 rounded-full flex flex-col items-center justify-center border-4 border-white shadow-lg transform group-hover:scale-110 transition-transform">
                <span class="text-white text-[8px] md:text-[10px] font-bold uppercase">Ages</span>
                <span class="text-white text-sm md:text-sm font-black">13-14y</span>
              </div>
            </div>
            <div class="p-6 md:p-10 flex-grow">
              <div class="flex items-center gap-2 mb-2">
                <span class="w-6 md:w-8 h-1 bg-orange-400 rounded-full"></span>
                <span class="text-orange-600 font-bold text-[10px] md:text-xs uppercase tracking-widest">Health &
                  Play</span>
              </div>
              <h3 class="text-2xl md:text-3xl lg:text-3xl font-extrabold text-slate-800 mb-4 tracking-tight leading-none">
                Physical<br>Activity</h3>
              <p class="text-slate-600 text-base md:text-lg font-medium leading-snug">
                Sports, movement games, and outdoor play to encourage healthy growth and coordination.
              </p>
            </div>
          </div>
        </div>

        <!-- 6. Science & Nature Program -->
        <div
          class="group relative bg-[#FFFBEB] p-2 md:p-3 rounded-[2rem] md:rounded-[2rem] border-2 border-dashed border-yellow-200 hover:border-yellow-400 transition-all duration-500">
          <div class="bg-white rounded-[2rem] md:rounded-[2rem] overflow-hidden shadow-sm h-full flex flex-col">
            <div class="relative overflow-hidden">
              <img src="{{ asset('assets/images/others/Discovery__STEM_Science__Nature_2_50.png') }}"
                class="w-full h-64 md:h-80 object-cover rounded-b-[2rem] md:rounded-b-[2rem] group-hover:rounded-b-none transition-all duration-700"
                alt="Science & Nature">
              <div
                class="absolute bottom-4 right-6 md:right-8 w-16 h-16 md:w-20 md:h-20 bg-indigo-400 rounded-full flex flex-col items-center justify-center border-4 border-white shadow-lg transform group-hover:scale-110 transition-transform">
                <span class="text-white text-[8px] md:text-[10px] font-bold uppercase">Ages</span>
                <span class="text-white text-sm md:text-sm font-black">14-15y</span>
              </div>
            </div>
            <div class="p-6 md:p-10 flex-grow">
              <div class="flex items-center gap-2 mb-2">
                <span class="w-6 md:w-8 h-1 bg-indigo-400 rounded-full"></span>
                <span class="text-indigo-600 font-bold text-[10px] md:text-xs uppercase tracking-widest">Discovery &
                  STEM</span>
              </div>
              <h3 class="text-2xl md:text-3xl lg:text-3xl font-extrabold text-slate-800 mb-4 tracking-tight leading-none">
                Science &<br>Nature</h3>
              <p class="text-slate-600 text-base md:text-lg font-medium leading-snug">
                Exploring the wonders of the natural world through hands-on experiments and garden discoveries.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Enrollment & Special Offer Section --}}

  <section id="enrollment" class="py-24 bg-[#FDFCF7] relative overflow-hidden">
    <!-- Decorative Stars (Matching previous circle effect) -->
    <div class="absolute -top-0 -left-0 w-48 h-48 opacity-20">
      <svg viewBox="0 0 24 24" class="w-full h-full text-yellow-300 fill-current">
        <polygon points="12,2 15,10 23,10 17,14 19,22 12,17 5,22 7,14 1,10 9,10" />
      </svg>
    </div>

    <div class="absolute -bottom-0 -right-0 w-48 h-48 opacity-15">
      <svg viewBox="0 0 24 24" class="w-full h-full text-yellow-400 fill-current">
        <polygon points="12,2 15,10 23,10 17,14 19,22 12,17 5,22 7,14 1,10 9,10" />
      </svg>
    </div>

    <div class="container mx-auto px-6 max-w-7xl relative z-10">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16 items-center">

        {{-- Left Side: Digital Flyer / Promotion --}}
        <div class="space-y-8" data-aos="fade-up-right" data-aos-duration="1200" data-aos-delay="400"
          data-aos-easing="ease-out-cubic" data-aos-offset="200">
          <div>
            <span
              class="inline-block bg-yellow-100 text-yellow-700 px-4 py-1 rounded-full text-sm font-bold uppercase tracking-widest mb-4">
              Limited Time Offer
            </span>
            <h2 class="text-4xl md:text-6xl font-black text-slate-900 leading-tight">
              End of Year <br>
              <span class="text-yellow-600 italic">Sale Event!</span>
            </h2>
            <p class="text-slate-600 mt-6 text-xl leading-relaxed">
              Secure your child's future at <span class="font-bold text-slate-900">Busy Bees Academy</span>. Open for new
              enrollments with exclusive savings until January 31st!
            </p>
          </div>

          {{-- The Big Deals --}}
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div
              class="bg-white p-6 rounded-3xl shadow-sm border-2 border-dashed border-yellow-200 flex items-center gap-4 group">
              <div
                class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center text-white shrink-0 group-hover:scale-125 duration-700 transform">
                <span class="text-xl font-bold">50%</span>
              </div>
              <p class="font-bold text-slate-800">OFF First Month</p>
            </div>
            <div
              class="bg-white p-6 rounded-3xl shadow-sm border-2 border-dashed border-yellow-300 flex items-center gap-4 group">
              <div
                class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center text-white shrink-0  group-hover:scale-125 duration-700 transform">
                <span class="text-xl font-bold">$0</span>
              </div>
              <p class="font-bold text-slate-800">Initiation Fee</p>
            </div>
          </div>

          {{-- Program List --}}
          <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100">
            <h3 class="text-lg font-bold text-slate-900 mb-6 flex items-center gap-2">
              <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>
              Available Programs
            </h3>
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8">
              <li class="flex items-center gap-3 text-slate-600">
                <span class="w-2 h-2 rounded-full bg-yellow-500"></span> Infant Care (0-18m)
              </li>
              <li class="flex items-center gap-3 text-slate-600">
                <span class="w-2 h-2 rounded-full bg-yellow-500"></span> Toddler (18m - 3y)
              </li>
              <li class="flex items-center gap-3 text-slate-600">
                <span class="w-2 h-2 rounded-full bg-yellow-500"></span> Before & After School
              </li>
              <li class="flex items-center gap-3 text-slate-600">
                <span class="w-2 h-2 rounded-full bg-yellow-500"></span> Summer & Holiday Care
              </li>
            </ul>
            <div class="mt-8 pt-6 border-t border-slate-50 flex items-center justify-between">
              <div>
                <p class="text-sm text-slate-400 uppercase tracking-widest font-bold">Starting At</p>
                <p class="text-3xl font-black text-slate-900">$299.99<span
                    class="text-sm font-normal text-slate-500">/week</span></p>
              </div>
              <img src="{{ asset('assets/images/others/Logo.jpg') }}" alt="Busy Bees Logo" class="h-12 opacity-50">
            </div>
          </div>
        </div>

        {{-- Right Side: Enrollment Form --}}
        <div class="relative" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="300"
          data-aos-easing="ease-in-out">
          {{-- Decorative Frame --}}
          <div class="absolute inset-0 bg-yellow-400 rounded-[3rem] rotate-3 translate-x-2 translate-y-2"></div>

          <div class="relative bg-white p-8 md:p-12 rounded-[3rem] shadow-2xl border border-slate-100">
            <div class="text-center mb-10">
              <h3 class="text-3xl font-black text-slate-900">Join the Family</h3>
              <p class="text-slate-500 mt-2">Fill out the form to secure your spot</p>
            </div>

            <form action="#" class="space-y-10">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                  <label class="text-sm font-bold text-slate-700 ml-2 mb-2 block">Child's Name</label>
                  <input type="text" placeholder="Full Name"
                    class="w-full px-6 py-4 rounded-2xl bg-slate-50 border-transparent focus:border-yellow-400 focus:bg-white focus:ring-0 transition-all duration-300">
                </div>
                <div>
                  <label class="text-sm font-bold text-slate-700 ml-2 mb-2 block">Child's Age</label>
                  <input type="text" placeholder="e.g. 2 years"
                    class="w-full px-6 py-4 rounded-2xl bg-slate-50 border-transparent focus:border-yellow-400 focus:bg-white focus:ring-0 transition-all duration-300">
                </div>
              </div>

              <div>
                <label class="text-sm font-bold text-slate-700 ml-2 mb-2 block">Parent's Email</label>
                <input type="email" placeholder="email@example.com"
                  class="w-full px-6 py-4 rounded-2xl bg-slate-50 border-transparent focus:border-yellow-400 focus:bg-white focus:ring-0 transition-all duration-300">
              </div>

              <div>
                <label class="text-sm font-bold text-slate-700 ml-2 mb-2 block">Select Program</label>
                <select
                  class="w-full px-6 py-4 rounded-2xl bg-slate-50 border-transparent focus:border-yellow-400 focus:bg-white focus:ring-0 transition-all duration-300 appearance-none">
                  <option>Infant Care</option>
                  <option>Toddler Program</option>
                  <option>After School Care</option>
                </select>
              </div>

              <button type="submit"
                class="w-full bg-slate-900 hover:bg-yellow-400 hover:text-[#000]  text-white font-black py-5 rounded-2xl shadow-xl shadow-slate-200 hover:shadow-yellow-200 transition-all duration-300 transform hover:-translate-y-1">
                Claim My 50% Offer →
              </button>

              <p class="text-center text-sm text-dark mt-4 italic">
                *Terms and conditions apply. Offer valid until Jan 31st.
              </p>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- Facilities Section --}}

  <section id="facilities" class="py-15 md:py-20 bg-slate-50">
    <div class="max-w-7xl lg:container mx-auto px-6">

      <div class="md:text-center mb-8 md:mb-16 relative">
        <div class="absolute -top-12 left-1/2 -translate-x-1/2 opacity-20 blur-3xl w-72 h-72 bg-yellow-400 rounded-full">
        </div>

        <span
          class="inline-block bg-yellow-100 text-yellow-700 px-6 py-2 rounded-full text-sm font-bold tracking-widest uppercase relative z-10">
          Our Facilities
        </span>

        <h2 class="mt-4 text-4xl md:text-4xl font-black text-slate-900 relative z-10">
          Safe, Fun, and Stimulating Spaces
        </h2>

        <p class="text-slate-600 mt-4 max-w-2xl mx-auto text-lg">
          Discover our well-equipped classrooms, colorful play areas, creative activity zones, and secure environment
          designed to help children learn, play, and grow every day.
        </p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-4">

        <!-- 1. Modern Classrooms -->
        <div
          class="group relative w-full h-[500px] md:h-[600px] overflow-hidden rounded-[2rem] md:rounded-[2rem] shadow-2xl cursor-pointer">
          <img src="{{ asset('assets/images/others/Modrneclassroom.png') }}"
            class="absolute inset-0 w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-[1.5s] ease-in-out group-hover:scale-110">
          <div
            class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-90 group-hover:opacity-70 transition-opacity duration-700">
          </div>
          <div class="absolute inset-0 p-8 md:p-12 flex flex-col justify-end">
            <div class="h-0 group-hover:h-16 w-1 bg-yellow-400 transition-all duration-700 mb-6 rounded-full"></div>
            <div class="transform translate-y-12 group-hover:translate-y-4 transition-transform duration-700 ease-out">
              <h3 class="text-3xl md:text-4xl font-black text-white tracking-tighter mb-4 leading-none">Modern <br><span
                  class="text-yellow-400">Classrooms.</span></h3>
              <p
                class="text-white/80 text-lg font-medium max-w-md mb-8 opacity-0 group-hover:opacity-100 transition-opacity duration-1000 delay-200 leading-relaxed">
                Experience a high-resolution learning environment where safety meets innovation. Our classrooms feature
                sun-lit spaces and premium Montessori tools designed to spark early curiosity and foster cognitive growth.
              </p>
              <div class="flex flex-wrap gap-3 opacity-0 group-hover:opacity-100 transition-all duration-1000 delay-300">
                <span
                  class="px-5 py-2 border border-white/30 backdrop-blur-md rounded-full text-white text-[10px] font-bold uppercase tracking-widest">24/7
                  Security</span>
                <span
                  class="px-5 py-2 border border-white/30 backdrop-blur-md rounded-full text-white text-[10px] font-bold uppercase tracking-widest">Eco-Friendly</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 2. Safe Playground -->
        <div
          class="group relative w-full h-[500px] md:h-[600px] overflow-hidden rounded-[2rem] md:rounded-[2rem] shadow-2xl cursor-pointer">
          <img src="{{ asset('assets/images/others/Safeplayground.png') }}"
            class="absolute inset-0 w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-[1.5s] ease-in-out group-hover:scale-110">
          <div
            class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-90 group-hover:opacity-70 transition-opacity duration-700">
          </div>
          <div class="absolute inset-0 p-8 md:p-12 flex flex-col justify-end">
            <div class="h-0 group-hover:h-16 w-1 bg-green-400 transition-all duration-700 mb-6 rounded-full"></div>
            <div class="transform translate-y-12 group-hover:translate-y-4 transition-transform duration-700 ease-out">
              <h3 class="text-3xl md:text-4xl font-black text-white tracking-tighter mb-4 leading-none">Safe <br><span
                  class="text-green-400">Playground.</span></h3>
              <p
                class="text-white/80 text-lg font-medium max-w-md mb-8 opacity-0 group-hover:opacity-100 transition-opacity duration-1000 delay-200 leading-relaxed">
                Our outdoor play areas are engineered with safety-first materials, featuring impact-absorbing surfaces and
                age-appropriate equipment that encourages physical exploration while ensuring every child remains
                protected.
              </p>
              <div class="flex flex-wrap gap-3 opacity-0 group-hover:opacity-100 transition-all duration-1000 delay-300">
                <span
                  class="px-5 py-2 border border-white/30 backdrop-blur-md rounded-full text-white text-[10px] font-bold uppercase tracking-widest">Soft
                  Flooring</span>
                <span
                  class="px-5 py-2 border border-white/30 backdrop-blur-md rounded-full text-white text-[10px] font-bold uppercase tracking-widest">Sun-Safe</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 3. Creative Studio -->
        <div
          class="group relative w-full h-[500px] md:h-[600px] overflow-hidden rounded-[2rem] md:rounded-[2rem] shadow-2xl cursor-pointer">
          <img src="{{ asset('assets/images/others/CreativeStudio.jpg') }}"
            class="absolute inset-0 w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-[1.5s] ease-in-out group-hover:scale-110">
          <div
            class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-90 group-hover:opacity-70 transition-opacity duration-700">
          </div>
          <div class="absolute inset-0 p-8 md:p-12 flex flex-col justify-end">
            <div class="h-0 group-hover:h-16 w-1 bg-pink-400 transition-all duration-700 mb-6 rounded-full"></div>
            <div class="transform translate-y-12 group-hover:translate-y-4 transition-transform duration-700 ease-out">
              <h3 class="text-3xl md:text-4xl font-black text-white tracking-tighter mb-4 leading-none">Creative <br><span
                  class="text-pink-400">Studio.</span></h3>
              <p
                class="text-white/80 text-lg font-medium max-w-md mb-8 opacity-0 group-hover:opacity-100 transition-opacity duration-1000 delay-200 leading-relaxed">
                A vibrant workspace where imagination comes to life through tactile arts, music, and rhythmic play. We
                provide a diverse range of premium materials that empower children to express their unique artistic
                visions daily.
              </p>
              <div class="flex flex-wrap gap-3 opacity-0 group-hover:opacity-100 transition-all duration-1000 delay-300">
                <span
                  class="px-5 py-2 border border-white/30 backdrop-blur-md rounded-full text-white text-[10px] font-bold uppercase tracking-widest">Art
                  Supplies</span>
                <span
                  class="px-5 py-2 border border-white/30 backdrop-blur-md rounded-full text-white text-[10px] font-bold uppercase tracking-widest">Music
                  Zone</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 4. Organic Kitchen -->
        <div
          class="group relative w-full h-[500px] md:h-[600px] overflow-hidden rounded-[2rem] md:rounded-[2rem] shadow-2xl cursor-pointer">
          <img src="{{ asset('assets/images/others/OrganicKitchen.png') }}"
            class="absolute inset-0 w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-[1.5s] ease-in-out group-hover:scale-110">
          <div
            class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-90 group-hover:opacity-70 transition-opacity duration-700">
          </div>
          <div class="absolute inset-0 p-8 md:p-12 flex flex-col justify-end">
            <div class="h-0 group-hover:h-16 w-1 bg-orange-400 transition-all duration-700 mb-6 rounded-full"></div>
            <div class="transform translate-y-12 group-hover:translate-y-4 transition-transform duration-700 ease-out">
              <h3 class="text-3xl md:text-4xl font-black text-white tracking-tighter mb-4 leading-none">Organic <br><span
                  class="text-orange-400">Kitchen.</span></h3>
              <p
                class="text-white/80 text-lg font-medium max-w-md mb-8 opacity-0 group-hover:opacity-100 transition-opacity duration-1000 delay-200 leading-relaxed">
                Nourishing growing bodies with premium, chef-prepared meals sourced from organic ingredients. Our kitchen
                follows strict allergy-aware protocols to ensure every child receives balanced nutrition tailored to their
                needs.
              </p>
              <div class="flex flex-wrap gap-3 opacity-0 group-hover:opacity-100 transition-all duration-1000 delay-300">
                <span
                  class="px-5 py-2 border border-white/30 backdrop-blur-md rounded-full text-white text-[10px] font-bold uppercase tracking-widest">Nut-Free</span>
                <span
                  class="px-5 py-2 border border-white/30 backdrop-blur-md rounded-full text-white text-[10px] font-bold uppercase tracking-widest">Fresh
                  Prep</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 5. Little Tech Lab -->
        <div
          class="group relative w-full h-[500px] md:h-[600px] overflow-hidden rounded-[2rem] md:rounded-[2rem] shadow-2xl cursor-pointer">
          <img src="{{ asset('assets/images/others/LittleTechLab.png') }}"
            class="absolute inset-0 w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-[1.5s] ease-in-out group-hover:scale-110">
          <div
            class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-90 group-hover:opacity-70 transition-opacity duration-700">
          </div>
          <div class="absolute inset-0 p-8 md:p-12 flex flex-col justify-end">
            <div class="h-0 group-hover:h-16 w-1 bg-indigo-400 transition-all duration-700 mb-6 rounded-full"></div>
            <div class="transform translate-y-12 group-hover:translate-y-4 transition-transform duration-700 ease-out">
              <h3 class="text-3xl md:text-4xl font-black text-white tracking-tighter mb-4 leading-none">Little Tech
                <br><span class="text-indigo-400">Lab.</span>
              </h3>
              <p
                class="text-white/80 text-lg font-medium max-w-md mb-8 opacity-0 group-hover:opacity-100 transition-opacity duration-1000 delay-200 leading-relaxed">
                Bridging the gap between play and future-ready skills through guided STEM activities. Our lab provides a
                safe, monitored introduction to digital literacy and interactive problem-solving tools for curious young
                learners.
              </p>
              <div class="flex flex-wrap gap-3 opacity-0 group-hover:opacity-100 transition-all duration-1000 delay-300">
                <span
                  class="px-5 py-2 border border-white/30 backdrop-blur-md rounded-full text-white text-[10px] font-bold uppercase tracking-widest">STEM
                  Focus</span>
                <span
                  class="px-5 py-2 border border-white/30 backdrop-blur-md rounded-full text-white text-[10px] font-bold uppercase tracking-widest">Safe
                  Media</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 6. Quiet Rest Zone -->
        <div
          class="group relative w-full h-[500px] md:h-[600px] overflow-hidden rounded-[2rem] md:rounded-[2rem] shadow-2xl cursor-pointer">
          <img src="{{ asset('assets/images/others/QuietRestZone.png') }}"
            class="absolute inset-0 w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-[1.5s] ease-in-out group-hover:scale-110">
          <div
            class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-90 group-hover:opacity-70 transition-opacity duration-700">
          </div>
          <div class="absolute inset-0 p-8 md:p-12 flex flex-col justify-end">
            <div class="h-0 group-hover:h-16 w-1 bg-rose-400 transition-all duration-700 mb-6 rounded-full"></div>
            <div class="transform translate-y-12 group-hover:translate-y-4 transition-transform duration-700 ease-out">
              <h3 class="text-3xl md:text-4xl font-black text-white tracking-tighter mb-4 leading-none">Quiet Rest
                <br><span class="text-rose-400">Zone.</span>
              </h3>
              <p
                class="text-white/80 text-lg font-medium max-w-md mb-8 opacity-0 group-hover:opacity-100 transition-opacity duration-1000 delay-200 leading-relaxed">
                A serene, climate-controlled sanctuary designed for restorative naps and peaceful downtime. With soothing
                ambient lighting and soft textures, we ensure every child recharges comfortably during their busy day.
              </p>
              <div class="flex flex-wrap gap-3 opacity-0 group-hover:opacity-100 transition-all duration-1000 delay-300">
                <span
                  class="px-5 py-2 border border-white/30 backdrop-blur-md rounded-full text-white text-[10px] font-bold uppercase tracking-widest">Climate
                  Control</span>
                <span
                  class="px-5 py-2 border border-white/30 backdrop-blur-md rounded-full text-white text-[10px] font-bold uppercase tracking-widest">Nap
                  Mats</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- Testimonials Section --}}

  <section id="testimonials" class="py-[30px] md:py-24 bg-slate-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">

      <!-- Heading -->
      <div class="md:text-center mb-8 md:mb-16 relative">
        <div class="absolute -top-12 left-1/2 -translate-x-1/2 opacity-20 blur-3xl w-72 h-72 bg-yellow-400 rounded-full">
        </div>

        <span
          class="inline-block bg-yellow-100 text-yellow-700 px-6 py-2 rounded-full text-sm font-bold tracking-widest uppercase relative z-10">
          Parent Voices
        </span>

        <h2 class="mt-4 text-4xl md:text-4xl font-black text-slate-900 relative z-10">
          Trusted by Over 500+ Families
        </h2>

        <p class="text-slate-600 mt-4 max-w-2xl mx-auto text-lg">
          Join our growing community of happy parents who have witnessed their children thrive in our care.
        </p>
      </div>

      <!-- Slider -->
      <div class="relative">
        <!-- Edge fade -->
        <div
          class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-slate-50 to-transparent z-20 pointer-events-none">
        </div>
        <div
          class="absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-slate-50 to-transparent z-20 pointer-events-none">
        </div>

        <div class="overflow-hidden">
          <div class="flex w-max gap-4 md:gap-8  md:py-5 animate-marquee hover:[animation-play-state:paused]">

            @php
              $testimonials = [
                [
                  'quote' => 'A warm, caring environment where my child feels safe, happy, and excited to learn every single day.',
                  'name' => 'Sara Ali',
                  'role' => 'Mother of 3-Year-Old',
                  'image' => 'assets/images/others/user.jfif',
                ],
                [
                  'quote' => 'Dedicated teachers and engaging activities that support learning, creativity, and confidence from an early age.',
                  'name' => 'Ahmed Khan',
                  'role' => 'Father of Preschooler',
                  'image' => 'assets/images/others/user.jfif',
                ],
                [
                  'quote' => 'A trusted daycare with loving staff who truly understand children’s emotional and developmental needs.',
                  'name' => 'Ayesha Noor',
                  'role' => 'New Parent',
                  'image' => 'assets/images/others/user.jfif',
                ],
                [
                  'quote' => 'Safe surroundings and playful learning help my child grow socially, emotionally, and academically with joy.',
                  'name' => 'Fatima Khan',
                  'role' => 'Mother of Toddler',
                  'image' => 'assets/images/others/user.jfif',
                ],
                [
                  'quote' => 'Exceptional care combined with early education creates a positive foundation for lifelong learning.',
                  'name' => 'Waseem Raza',
                  'role' => 'Parent',
                  'image' => 'assets/images/others/user.jfif',
                ],
              ];
            @endphp

            @foreach($testimonials as $testimonial)
              <div
                class="w-[280px] mx-auto md:w-[400px] flex-shrink-0 bg-white p-4 md:p-6 rounded-tr-[2.5rem] rounded-bl-[2.5rem] shadow-md border-2 border-yellow-400 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 relative">

                {{-- Optional Icon --}}
                <div class="absolute top-4 right-4 md:top-8 md:right-8 text-slate-100">
                  <svg class="w-10 h-10 md:w-14 md:h-14 fill-current" viewBox="0 0 24 24">
                    <path
                      d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V12C14.017 12.5523 13.5693 13 13.017 13H11.017V6H22.017V15C22.017 18.3137 19.3307 21 16.017 21H14.017Z" />
                  </svg>
                </div>

                {{-- Stars --}}
                <div class="flex gap-1 mb-2 md:mb-3">
                  @for($i = 0; $i < 5; $i++)
                    <svg class="w-4 h-4 md:w-5 md:h-5 text-amber-400 fill-current" viewBox="0 0 20 20">
                      <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                  @endfor
                </div>

                {{-- Styled Quote --}}
                <p
                  class="relative text-slate-700 text-sm md:text-lg italic leading-relaxed mb-4 md:mb-8 px-4 md:px-12 break-words whitespace-normal">
                  <span class="absolute left-0 top-0 text-4xl md:text-5xl text-slate-300 font-serif leading-none">“</span>
                  <span>{{ $testimonial['quote'] }}</span>
                  <span
                    class="absolute right-0 -bottom-2 md:-bottom-4 text-4xl md:text-5xl text-slate-300 font-serif leading-none">”</span>
                </p>

                {{-- User Info --}}
                <div class="flex items-center gap-3 md:gap-4 pt-3 md:pt-5 border-t border-slate-100">
                  <img src="{{ asset($testimonial['image']) }}"
                    class="w-10 h-10 md:w-14 md:h-14 rounded-full border-2 border-yellow-400">
                  <div>
                    <h4 class="font-bold text-slate-900 text-sm md:text-base">{{ $testimonial['name'] }}</h4>
                    <p class="text-yellow-600 text-xs md:text-sm font-semibold">{{ $testimonial['role'] }}</p>
                  </div>
                </div>
              </div>
            @endforeach

          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- Gallery Section --}}

  <section id="gallery" class="py-10 md:py-20 bg-gray-50">
    <div class="max-w-7xl lg:container mx-auto px-6">
      <div class="md:text-center mb-8 md:mb-16 relative">
        <div class="absolute -top-12 left-1/2 -translate-x-1/2 opacity-20 blur-3xl w-72 h-72 bg-yellow-400 rounded-full">
        </div>

        <span
          class="inline-block bg-yellow-100 text-yellow-700 px-6 py-2 rounded-full text-sm font-bold tracking-widest uppercase relative z-10">
          Our Moments
        </span>

        <h2 class="mt-4 text-4xl md:text-4xl font-black text-slate-900 relative z-10">
          Capturing Fun and Learning
        </h2>

        <p class="text-slate-600 mt-4 max-w-2xl mx-auto text-lg">
          Explore our gallery to see how children enjoy their time, learn, and grow in a safe and nurturing environment.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3  gap-4">

        @php
          $galleryItems = [
            [
              'image' => 'assets/images/others/Safe_Play_Area_50.png',
              'title' => 'Safe Play Area',
              'tag' => 'SECURE & FUN',
            ],
            [
              'image' => 'assets/images/others/Creative_Activities_50.png',
              'title' => 'Creative Activities',
              'tag' => 'LEARNING',
            ],
            [
              'image' => 'assets/images/others/Caring_Staff_50.png',
              'title' => 'Caring Staff',
              'tag' => 'TRUSTED CARE',
            ],
            [
              'image' => 'assets/images/others/Happy_Moments_50.png',
              'title' => 'Healthy Meals',
              'tag' => 'NUTRITION',
            ],
            [
              'image' => 'assets/images/others/Group_Learning_50.png',
              'title' => 'Group Learning',
              'tag' => 'TEAMWORK',
            ],
            [
              'image' => 'assets/images/others/Nap__Rest_Time_29.png',
              'title' => 'Nap & Rest Time',
              'tag' => 'COMFORT',
            ],
            [
              'image' => 'assets/images/others/Outdoor_Activities_29.png',
              'title' => 'Outdoor Activities',
              'tag' => 'ENERGY',
            ],
            [
              'image' => 'assets/images/others/Early_Education_50.png',
              'title' => 'Early Education',
              'tag' => 'FOUNDATION',
            ],
            [
              'image' => 'assets/images/others/Healthy_Meals__50.png',
              'title' => 'Happy Moments',
              'tag' => 'JOY',
            ],
          ];
        @endphp

        @foreach($galleryItems as $item)
          <div class="relative group cursor-pointer">

            <!-- Image -->
            <div class="overflow-hidden rounded-2xl ring-1 ring-gray-200
                       group-hover:ring-2 group-hover:ring-yellow-300
                       transition-all duration-500">
              <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" class="w-full h-[300px] object-cover
                         filter grayscale group-hover:grayscale-0
                         transition-all duration-500
                         transform group-hover:scale-105">
            </div>

            <div class="absolute bottom-4 left-4 right-4
                       bg-white/90 backdrop-blur-sm
                       p-3 rounded-xl shadow-lg
                       opacity-0 translate-y-2
                       group-hover:opacity-100 group-hover:translate-y-0
                       transition-all duration-300">

              <div class="flex justify-between items-center">
                <h3 class="text-md font-semibold text-slate-900 leading-tight tracking-tight">
                  {{ $item['title'] }}
                </h3>
                <div class="flex">
                  <span
                    class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-widest bg-yellow-100 text-yellow-700 border border-yellow-200">
                    {{ $item['tag'] }}
                  </span>
                </div>
              </div>

            </div>
          </div>
        @endforeach

      </div>

    </div>
  </section>

  {{-- Contact Section --}}

  <section id="contact" class="relative py-20 bg-[#FDFCF7] overflow-hidden">

    <div class="absolute -top-0 -left-0 w-48 h-48 opacity-20">
      <svg viewBox="0 0 24 24" class="w-full h-full text-yellow-300 fill-current">
        <polygon points="12,2 15,10 23,10 17,14 19,22 12,17 5,22 7,14 1,10 9,10" />
      </svg>
    </div>

    <div class="absolute -bottom-0 -right-0 w-48 h-48 opacity-15">
      <svg viewBox="0 0 24 24" class="w-full h-full text-yellow-400 fill-current">
        <polygon points="12,2 15,10 23,10 17,14 19,22 12,17 5,22 7,14 1,10 9,10" />
      </svg>
    </div>


    <div class="container mx-auto px-6 max-w-6xl relative z-10">
      <h2 class="text-3xl sm:text-4xl font-bold text-center mb-12">Contact Us</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
        <div class="relative" data-aos="zoom-in-right" data-aos-duration="1200" data-aos-delay="300"
          data-aos-easing="ease-out-cubic">
          <div class="absolute inset-0 bg-yellow-400 rounded-2xl rotate-2 translate-x-2 translate-y-2"></div>
          <form class="relative bg-white p-8 rounded-xl shadow-lg space-y-6">
            <input type="text" placeholder="Your Name"
              class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 transition">

            <input type="email" placeholder="Your Email"
              class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 transition">

            <textarea placeholder="Your Message" rows="5"
              class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 transition"></textarea>

            <button
              class="w-full bg-yellow-400 hover:bg-yellow-500 text-dark font-bold py-4 px-6 rounded-lg transition transform hover:-translate-y-1 hover:shadow-lg">
              Send Message
            </button>
          </form>
        </div>

        {{-- Contact Info --}}
        <div class="space-y-6 border-l-4 border-yellow-400 pl-2 md:pl-12" data-aos="zoom-in-left" data-aos-duration="1200"
          data-aos-delay="300" data-aos-easing="ease-out-cubic">

          <div class="flex items-start gap-4">
            <i class="fas fa-map-marker-alt text-yellow-400 text-2xl mt-1"></i>
            <div>
              <h4 class="font-bold text-lg">Address</h4>
              <p class="text-gray-600">4955 KILLEBREW DR, ANNANDALE VA, 22003</p>
            </div>
          </div>

          <div class="flex items-start gap-4">
            <i class="fas fa-phone-alt text-yellow-400 text-2xl mt-1"></i>
            <div>
              <h4 class="font-bold text-lg">Phone</h4>
              <p class="text-gray-600">(703) 745 - 7040</p>
            </div>
          </div>

          <div class="flex items-start gap-4">
            <i class="fas fa-envelope text-yellow-400 text-2xl mt-1"></i>
            <div>
              <h4 class="font-bold text-lg">Email</h4>
              <a href="mailto:info@beeswebsite.com" class="text-gray-600 hover:text-yellow-500 transition">
                info@beeswebsite.com
              </a>
            </div>
          </div>

          {{-- Embedded Google Map --}}
          <div class="mt-6">
            <iframe class="w-full h-56 rounded-lg shadow-md"
              src="https://www.google.com/maps?q=4955+Killebrew+Dr,+Annandale,+VA+22003&output=embed" style="border:0;"
              allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>

        </div>
      </div>
    </div>
  </section>

@endsection