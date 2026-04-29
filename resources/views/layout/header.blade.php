<nav class="navbar bg-gray-50">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="w-[60px] h-[60px] rounded-circle" src="{{asset('assets/images/others/busybeesfvicon.png')}}" alt="profile">
        </a>
      <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">

  <!-- USER INFO -->
  <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
    <div class="mb-1">
      <img class="w-[60px] h-[60px] rounded-circle"
           src="{{ asset('assets/images/others/busybeesfvicon.png') }}"
           alt="User">
    </div>
    <div class="text-center">
      <p class="tx-16 fw-bolder mb-0">{{ auth()->user()->name }}</p>
    </div>
  </div>

    <!-- ACTIONS -->
    <ul class="list-unstyled m-0 p-0">

      <!-- PROFILE -->
      <li>
       <a href="{{ route('users.edit', auth()->user()) }}"
       class="flex items-center gap-3 hover:text-gray-800 px-3 py-2 border bottom-1 text-sm hover:bg-[#e2e8f0]">
      <i class="fas fa-user-circle text-muted text-xl"></i>
      Profile
    </a>
      </li>

      <!-- LOGOUT -->
      <li>
        <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit"
        class="w-full flex items-center text-gray-800 gap-3 px-4 py-2 text-sm hover:bg-[#e2e8f0] text-left">
        <i class="fas fa-sign-out-alt"></i>
        Logout
      </button>
    </form>

      </li>

    </ul>
</div>

      </li>
    </ul>
  </div>
</nav>