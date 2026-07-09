@extends('layout.master')

@section('title', 'Dashboard')
@section('subtitle', 'Overview of your application')

@section('content')

    @include('includes.messages')

    {{-- Welcome banner --}}
    <div class="admin-welcome-banner mb-6">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <p class="text-indigo-200 text-sm font-medium mb-1">Welcome back,</p>
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-2">{{ auth()->user()->name }}</h2>
                <p class="text-indigo-100 text-sm max-w-md">
                    Manage users, roles, and monitor system activity from your admin console.
                </p>
            </div>
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-white/10 border border-white/20 text-sm text-white">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    System Online
                </span>
            </div>
        </div>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">
        <div class="admin-stat-card">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Total Users</p>
                    <p class="text-3xl font-bold text-slate-800">{{ number_format($userTotal) }}</p>
                </div>
                <span class="action-icon bg-indigo-50 text-indigo-600">
                    <i class="fas fa-users"></i>
                </span>
            </div>
            <p class="text-xs text-slate-400 mt-3">Registered accounts</p>
        </div>

        <div class="admin-stat-card">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Roles</p>
                    <p class="text-3xl font-bold text-slate-800">{{ number_format($rolesTotal) }}</p>
                </div>
                <span class="action-icon bg-violet-50 text-violet-600">
                    <i class="fas fa-shield-halved"></i>
                </span>
            </div>
            <p class="text-xs text-slate-400 mt-3">Permission groups</p>
        </div>

        <div class="admin-stat-card">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Admissions</p>
                    <p class="text-3xl font-bold text-slate-800">{{ number_format($admissionRequest) }}</p>
                </div>
                <span class="action-icon bg-emerald-50 text-emerald-600">
                    <i class="fas fa-graduation-cap"></i>
                </span>
            </div>
            <p class="text-xs text-slate-400 mt-3">Student applications</p>
        </div>

        <div class="admin-stat-card">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Contacts</p>
                    <p class="text-3xl font-bold text-slate-800">{{ number_format($contactStudent) }}</p>
                </div>
                <span class="action-icon bg-amber-50 text-amber-600">
                    <i class="fas fa-envelope"></i>
                </span>
            </div>
            <p class="text-xs text-slate-400 mt-3">Inquiry submissions</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Quick actions --}}
        <div class="lg:col-span-2">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title mb-4">Quick Actions</h6>
                    <div class="grid sm:grid-cols-2 gap-3">
                        @can('create user')
                            <a href="{{ route('users.create') }}" class="admin-quick-action">
                                <span class="action-icon bg-indigo-50 text-indigo-600"><i class="fas fa-user-plus"></i></span>
                                <div>
                                    <p class="font-semibold text-sm mb-0">Add User</p>
                                    <p class="text-xs text-slate-400 mb-0">Create a new account</p>
                                </div>
                            </a>
                        @endcan

                        @can('view user')
                            <a href="{{ route('users.index') }}" class="admin-quick-action">
                                <span class="action-icon bg-sky-50 text-sky-600"><i class="fas fa-users"></i></span>
                                <div>
                                    <p class="font-semibold text-sm mb-0">Manage Users</p>
                                    <p class="text-xs text-slate-400 mb-0">View all users</p>
                                </div>
                            </a>
                        @endcan

                        @can('view role')
                            <a href="{{ route('roles.index') }}" class="admin-quick-action">
                                <span class="action-icon bg-violet-50 text-violet-600"><i class="fas fa-shield-halved"></i></span>
                                <div>
                                    <p class="font-semibold text-sm mb-0">Roles & Permissions</p>
                                    <p class="text-xs text-slate-400 mb-0">Configure access control</p>
                                </div>
                            </a>
                        @endcan

                        @if (auth()->user()->user_type === 'SuperAdmin')
                            <a href="{{ route('activitylog.activitylog') }}" class="admin-quick-action">
                                <span class="action-icon bg-rose-50 text-rose-600"><i class="fas fa-clock-rotate-left"></i></span>
                                <div>
                                    <p class="font-semibold text-sm mb-0">Activity Logs</p>
                                    <p class="text-xs text-slate-400 mb-0">Audit system events</p>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- System info --}}
        <div>
            <div class="card h-full">
                <div class="card-body">
                    <h6 class="card-title mb-4">System Information</h6>
                    <ul class="space-y-3">
                        <li class="flex items-center justify-between py-2 border-b border-slate-100">
                            <span class="text-sm text-slate-500">Framework</span>
                            <span class="text-sm font-semibold text-slate-700">Laravel {{ app()->version() }}</span>
                        </li>
                        <li class="flex items-center justify-between py-2 border-b border-slate-100">
                            <span class="text-sm text-slate-500">PHP Version</span>
                            <span class="text-sm font-semibold text-slate-700">{{ PHP_MAJOR_VERSION }}.{{ PHP_MINOR_VERSION }}</span>
                        </li>
                        <li class="flex items-center justify-between py-2 border-b border-slate-100">
                            <span class="text-sm text-slate-500">Your Role</span>
                            <span class="text-sm font-semibold text-indigo-600">{{ auth()->user()->user_type ?? 'User' }}</span>
                        </li>
                        <li class="flex items-center justify-between py-2">
                            <span class="text-sm text-slate-500">Environment</span>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-semibold {{ app()->environment('production') ? 'bg-emerald-50 text-emerald-700' : 'bg-amber-50 text-amber-700' }}">
                                {{ ucfirst(app()->environment()) }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
