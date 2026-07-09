@extends('layout.master')

@section('title', 'Profile')
@section('subtitle', 'Manage your account settings')

@section('content')
    @include('includes.messages')

    <div class="max-w-8xl mx-auto space-y-5">
        <div class="admin-profile-banner rounded-2xl p-6 sm:p-7 shadow-sm">
            <p class="text-[11px] uppercase tracking-widest font-bold text-indigo-600">Account Settings</p>
            <h2 class="text-3xl font-black text-slate-800 mt-1">Profile</h2>
            <p class="text-sm text-slate-600 mt-1">Manage your personal information, password, and account security from one place.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
            <div class="lg:col-span-8">
                <div class="card overflow-hidden">
                    <div class="admin-profile-card-header px-5 py-3 flex items-center justify-between">
                        <div>
                            <h3 class="text-xs uppercase tracking-widest font-bold text-slate-700">Profile Information</h3>
                            <p class="text-[11px] text-slate-500 mt-0.5">Update your account details and email address.</p>
                        </div>
                        @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-100 border border-amber-200 text-[10px] font-bold uppercase tracking-wider text-amber-700">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                                Verification Pending
                            </span>
                        @endif
                    </div>
                    <div class="p-5 sm:p-6">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 space-y-5">
                <div class="card overflow-hidden">
                    <div class="admin-profile-card-header px-5 py-3">
                        <h3 class="text-xs uppercase tracking-widest font-bold text-slate-700">Update Password</h3>
                        <p class="text-[11px] text-slate-500 mt-0.5">Use a strong, unique password to keep your account secure.</p>
                    </div>
                    <div class="p-5">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="card overflow-hidden border border-red-200 dark:border-red-900/50">
                    <div class="px-5 py-3 bg-red-50 dark:bg-red-950/30 border-b border-red-200 dark:border-red-900/40">
                        <h3 class="text-xs uppercase tracking-widest font-bold text-red-600 dark:text-red-300">Danger Zone</h3>
                        <p class="text-[11px] text-red-500 dark:text-red-300/80 mt-0.5">Permanently remove your account and all associated data.</p>
                    </div>
                    <div class="p-5">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
