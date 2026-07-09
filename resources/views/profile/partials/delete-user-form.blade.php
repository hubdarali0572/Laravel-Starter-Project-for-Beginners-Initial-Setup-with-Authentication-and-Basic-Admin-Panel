<section class="space-y-4" x-data="{ confirmDelete: false }">
    <div class="rounded-xl border border-red-200 dark:border-red-900/40 bg-red-50/70 dark:bg-red-950/20 p-4">
        <div class="flex items-start justify-between gap-3">
            <div class="flex items-start gap-3">
                <span class="mt-0.5 flex h-8 w-8 items-center justify-center rounded-lg bg-red-100 dark:bg-red-900/40 text-red-600 dark:text-red-300">
                    <i class="fas fa-triangle-exclamation text-sm"></i>
                </span>
                <p class="text-xs text-red-700 dark:text-red-300 leading-relaxed max-w-[15rem]">
                    Once deleted, all resources and data will be permanently removed. This action cannot be undone.
                </p>
            </div>
            <button type="button" @click="confirmDelete = !confirmDelete"
                class="admin-btn bg-red-600 text-white hover:bg-red-700 border border-red-600 !px-3 !py-2 !text-xs">
                {{ __('Delete Account') }}
            </button>
        </div>
    </div>

    <div x-show="confirmDelete" x-transition class="rounded-xl border border-red-200 dark:border-red-900/50 bg-red-50 dark:bg-red-950/30 p-5">
        <p class="text-sm text-red-700 dark:text-red-300 mb-4">
            {{ __('Please enter your password to confirm permanent account deletion.') }}
        </p>

        <form method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
            @csrf
            @method('delete')

            <div>
                <label for="password" class="admin-form-label">{{ __('Password') }}</label>
                <input id="password" name="password" type="password"
                    class="form-control admin-form-control mt-1 block w-full md:w-2/3"
                    placeholder="{{ __('Password') }}" />
                @if ($errors->userDeletion->get('password'))
                    <p class="text-red-500 text-xs mt-1">{{ $errors->userDeletion->first('password') }}</p>
                @endif
            </div>

            <div class="flex items-center gap-3">
                <button type="button" @click="confirmDelete = false" class="admin-btn admin-btn-secondary">
                    {{ __('Cancel') }}
                </button>
                <button type="submit" class="admin-btn bg-red-600 text-white hover:bg-red-700 border border-red-600">
                    <i class="fas fa-trash text-xs"></i> {{ __('Delete Account Permanently') }}
                </button>
            </div>
        </form>
    </div>
</section>
