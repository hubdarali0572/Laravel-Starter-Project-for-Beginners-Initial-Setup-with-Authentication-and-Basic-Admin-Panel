<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ url('dashboard') }}" class="sidebar-brand flex items-center gap-2.5 !p-0">
            <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-600 text-white text-sm shadow-lg shadow-indigo-600/30">
                <i class="fas fa-layer-group"></i>
            </span>
            <span class="text-slate-800 font-bold text-base tracking-tight">Admin<span class="text-indigo-600 font-normal">Panel</span></span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="sidebar-body flex flex-col h-[calc(100vh-64px)]">
        <ul class="nav flex-1">
            <li class="nav-category-label">Main Menu</li>

            <li class="nav-item {{ active_class(['dashboard.index']) }}">
                <a href="{{ url('dashboard') }}" class="nav-link gap-3">
                    <span class="nav-icon-wrap"><i class="fas fa-gauge-high"></i></span>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            @can('view user')
                <li class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}"
                    x-data="{ open: {{ request()->routeIs('users.*') ? 'true' : 'false' }} }">
                    <a href="javascript:void(0)" class="nav-link gap-3" @click="open = !open">
                        <span class="nav-icon-wrap"><i class="fas fa-users"></i></span>
                        <span class="link-title flex-1">Users</span>
                        <i class="fas fa-chevron-down text-xs transition-transform duration-200"
                            :class="{ 'rotate-180': open }"></i>
                    </a>
                    <ul x-show="open" x-collapse class="sub-menu mt-1 space-y-0.5">
                        <li class="nav-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="fas fa-list me-2 text-xs opacity-70"></i> All Users
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('users.create') ? 'active' : '' }}">
                            <a href="{{ route('users.create') }}" class="nav-link">
                                <i class="fas fa-user-plus me-2 text-xs opacity-70"></i> Add User
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('view role')
                <li class="nav-item {{ active_class(['roles.index', 'roles.create', 'roles.edit', 'show.assign.role.form']) }}">
                    <a href="{{ route('roles.index') }}" class="nav-link gap-3">
                        <span class="nav-icon-wrap"><i class="fas fa-shield-halved"></i></span>
                        <span class="link-title">Roles & Permissions</span>
                    </a>
                </li>
            @endcan

            @if (auth()->user()->user_type === 'SuperAdmin')
                <li class="nav-category-label mt-2">System</li>
                <li class="nav-item {{ Request::is('activity-logs*') ? 'active' : '' }}">
                    <a href="{{ route('activitylog.activitylog') }}" class="nav-link gap-3">
                        <span class="nav-icon-wrap"><i class="fas fa-clock-rotate-left"></i></span>
                        <span class="link-title">Activity Logs</span>
                    </a>
                </li>
            @endif
        </ul>

        {{-- User profile --}}
        <div class="sidebar-profile-wrap border-t p-3" x-data="{ open: false }">
            <button @click="open = !open" class="sidebar-profile-trigger w-full flex items-center gap-3 p-2.5 rounded-xl transition-all focus:outline-none">
                <span class="sidebar-profile-avatar flex h-10 w-10 items-center justify-center rounded-full text-sm font-bold shrink-0">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </span>
                <div class="flex-1 text-left min-w-0">
                    <p class="text-sm font-semibold text-slate-800 truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-slate-500 truncate">{{ auth()->user()->email }}</p>
                </div>
                <span class="sidebar-profile-chevron-wrap">
                    <i class="fas fa-chevron-down sidebar-profile-chevron text-[10px]" :class="{ 'rotate-180': open }"></i>
                </span>
            </button>

            <div x-show="open" x-transition @click.outside="open = false"
                class="sidebar-profile-menu mt-2 rounded-xl overflow-hidden">
                <a href="{{ route('profile.edit') }}"
                    class="sidebar-profile-menu-item flex items-center gap-3 px-4 py-2.5 text-sm text-slate-600 hover:text-slate-900 transition-colors">
                    <i class="fas fa-user-circle w-4 text-center"></i> Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="sidebar-profile-menu-item w-full flex items-center gap-3 px-4 py-2.5 text-sm text-slate-600 hover:text-slate-900 transition-colors text-left">
                        <i class="fas fa-sign-out-alt w-4 text-center"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
