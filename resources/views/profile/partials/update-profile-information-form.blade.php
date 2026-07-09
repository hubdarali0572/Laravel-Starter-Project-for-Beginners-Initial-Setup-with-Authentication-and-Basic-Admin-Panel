<section>
    <div class="mb-5 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-900 px-4 py-3 flex items-center gap-3">
        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-600 text-white font-bold shadow">
            {{ strtoupper(substr($user->name, 0, 2)) }}
        </span>
        <div>
            <p class="font-bold text-zinc-900 dark:text-white">{{ $user->name }}</p>
            <p class="text-sm text-zinc-500 dark:text-zinc-400">{{ $user->email }}</p>
        </div>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
            <label for="name" class="admin-form-label">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" class="form-control admin-form-control mt-1 block w-full"
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            </div>

            <div>
            <label for="email" class="admin-form-label">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="form-control admin-form-control mt-1 block w-full"
                value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-slate-600 dark:text-slate-300">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-indigo-600 hover:text-indigo-700 rounded-md focus:outline-none">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
            </div>
        </div>

        <div class="pt-3 flex items-center justify-between gap-3">
            <p class="text-xs text-slate-400">Changes are saved to your account immediately.</p>
            <button type="submit" class="admin-btn admin-btn-primary">
                <i class="fas fa-check text-xs"></i> {{ __('Save Changes') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-emerald-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
