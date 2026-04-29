<nav class="sidebar">
  <div class="sidebar-header bg-gray-50">

    <a href="{{url('dashboard')}}" class="sidebar-brand" style="padding-left:50px;">
      <img src="{{asset('assets/images/others/busybeesfvicon.png')}}" class="h-[60px] w-[60px] object-contain"
        alt="user.png">
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body bg-gray-200  flex flex-col h-[calc(100vh-70px)]">

    <ul class="nav">
      {{-- Dashboard --}}

      <li class="nav-item {{ active_class(['dashboard.index']) }}">
        <a href="{{ url('dashboard') }}" class="nav-link mb-3">
          <span class="rounded-full flex items-center justify-center ml-[10px]">
            <i class="fas fa-home"></i>
          </span>
          <span class="link-title font-[500]">Dashboard</span>
        </a>
      </li>

      {{-- Users --}}

      @can('view user')
        <li class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}"
          x-data="{ open: {{ request()->routeIs('users.*') ? 'true' : 'false' }} }">
          <!-- Parent -->
          <a href="javascript:void(0)" class="nav-link mb-3 flex items-center gap-2 rounded-md" @click="open = !open">
            <span class="rounded-full flex items-center justify-center  ml-[10px]">
              <i class="fas fa-user"></i>
            </span>
            <span class="link-title font-[500]">Users</span>
            <i class="fas fa-chevron-down ml-[85px] transition-transform duration-300"
              :class="{ 'rotate-180': open }"></i>
          </a>

          <!-- Submenu -->
          <ul x-show="open" x-collapse class="ml-10 space-y-2 sub-menu">

            <li class="nav-item  {{ request()->routeIs('users.index') ? 'active' : '' }}">

              <a href="{{ route('users.index') }}" class="nav-link  rounded-md">
                <i class="fas fa-users me-2 ms-2"></i> All Users
              </a>
            </li>

            <li class="nav-item {{ request()->routeIs('users.create') ? 'active' : '' }}">
              <a href="{{ route('users.create') }}" class="nav-link  rounded-md">
                <i class="fas fa-user-plus me-2 ms-2"></i> Add User
              </a>
            </li>

          </ul>
        </li>
      @endcan

      {{-- Admission Request --}}

      @can('view enrollment')
        <li class="nav-item {{ active_class(['enrollment.index', 'enrollment.create', 'enrollment.edit']) }}">
          <a href="#" class="nav-link mb-3 rounded-md">
            <span class="rounded-full flex items-center justify-center ml-[10px]">
              <i class="fas fa-book-reader"></i>
            </span>
            <span class="link-title font-[500]">Enrollment</span>
          </a>
        </li>
      @endcan


      {{-- Contact Request --}}
      @can('view contact')
        <li class="nav-item {{ active_class(['contact.index', 'contact.create', 'contact.edit']) }}">
          <a href="#" class="nav-link mb-3 rounded-md">
            <span class="rounded-full flex items-center justify-center  ml-[10px]">
              <i class="fas fa-phone"></i>
            </span>
            <span class="link-title font-[500]">Contact Us</span>
          </a>
        </li>
      @endcan

      {{-- Role --}}
      @can('view role')
        <li class="nav-item {{ active_class(['roles.index', 'roles.create', 'roles.edit', 'show.assign.role.form']) }}">
          <a href="{{ route('roles.index') }}" class="nav-link mb-3 rounded-md">
            <span class="rounded-full flex items-center justify-center  ml-[10px]">
              <i class="fas fa-user-shield"></i>
            </span>
            <span class="link-title font-[500]">Role</span>
          </a>
        </li>
      @endcan

      {{-- Activity Logs --}}
      @if (auth()->user()->user_type === 'SuperAdmin')
        <li class="nav-item {{ Request::is('activity-logs*') ? 'active' : '' }}">
          <a href="{{ route('activitylog.activitylog') }}" class="nav-link mb-3 rounded-md">
            <span class="rounded-full flex items-center justify-center ml-[10px]">
              <i class="fas fa-user-shield"></i>
            </span>
            <span class="link-title font-[500]">Activity Logs</span>
          </a>
        </li>
      @endif


      {{-- Login --}}

      <li class="nav-item">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline nav-link mb-3 rounded-md">
          @csrf
          <button type="submit" class="nav-link border-0 bg-transparent p-0 cursor-pointer">
            <span class="rounded-full flex items-center justify-center ml-[10px]">
              <i class="fas fa-sign-out-alt"></i>
            </span>
            <span class="link-title font-[500]">Logout</span>
          </button>

        </form>
      </li>
    </ul>

    <!-- Sidebar Footer -->
    <div class="mt-auto border-t border-gray-200 p-3" x-data="{ open: false }">

      <button @click="open = !open" class="w-full flex items-center gap-3 focus:outline-none">

        {{-- <img
          src="{{ auth()->user()->profile_image  ? asset('storage/' . auth()->user()->profile_image) : asset('assets/images/others/busybeesfvicon.png') }}"
          class="w-[50px] h-[50px] rounded-full object-cover" alt="User"> --}}

        <span class="rounded-full flex items-center justify-center ml-[25px]">
          <i class="fas fa-user"></i>
        </span>

        <div class="flex-1 text-left">
          <p class="text-sm font-semibold text-yellow-500">
            {{ auth()->user()->name }}
          </p>
          <p class="text-xs text-gray-500 truncate">
            {{ auth()->user()->email }}
          </p>
        </div>
      </button>

      <div x-show="open" x-transition @click.outside="open = false"
        class="mt-2 gap-2 bg-white shadow-md overflow-hidden">

        <a href="{{ route('users.edit', auth()->user()) }}"
          class="flex items-center gap-3 hover:text-gray-800 px-3 py-2 border bottom-1 text-sm hover:bg-gray-200">
          <i class="fas fa-user-circle text-muted text-xl"></i>

          Profile
        </a>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit"
            class="w-full flex items-center text-gray-800 gap-3 px-4 py-2 text-sm hover:bg-gray-200 text-left">
            <i class="fas fa-sign-out-alt"></i>
            Logout
          </button>
        </form>

      </div>
    </div>

  </div>
</nav>