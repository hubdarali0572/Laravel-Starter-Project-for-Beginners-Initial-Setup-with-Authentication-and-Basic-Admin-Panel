<section>
    <form method="post" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="admin-form-label">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password"
                class="form-control admin-form-control mt-1 block w-full" autocomplete="current-password" />
            @if ($errors->updatePassword->get('current_password'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->updatePassword->first('current_password') }}</p>
            @endif
        </div>

        <div>
            <label for="update_password_password" class="admin-form-label">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password"
                class="form-control admin-form-control mt-1 block w-full" autocomplete="new-password" />
            @if ($errors->updatePassword->get('password'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->updatePassword->first('password') }}</p>
            @endif
        </div>

        <div>
            <label for="update_password_password_confirmation" class="admin-form-label">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="form-control admin-form-control mt-1 block w-full" autocomplete="new-password" />
            @if ($errors->updatePassword->get('password_confirmation'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->updatePassword->first('password_confirmation') }}</p>
            @endif
        </div>

        <div class="pt-2">
            <button type="submit" class="admin-btn admin-btn-primary">
                <i class="fas fa-key text-xs"></i> {{ __('Update Password') }}
            </button>

            @if (session('status') === 'password-updated')
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
