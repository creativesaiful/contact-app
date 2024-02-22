<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form wire:submit.prevent="updatePassword">
                <h2>{{ __('Update Password') }}</h2>
                <p>{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>

                <div class="mb-3">
                    <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
                    <input id="current_password" type="password" class="form-control" wire:model="state.current_password" autocomplete="current-password" />
                    <x-input-error for="current_password" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('New Password') }}</label>
                    <input id="password" type="password" class="form-control" wire:model="state.password" autocomplete="new-password" />
                    <x-input-error for="password" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" type="password" class="form-control" wire:model="state.password_confirmation" autocomplete="new-password" />
                    <x-input-error for="password_confirmation" class="mt-2" />
                </div>

                <div>
                    <button class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                </div>

                <x-action-message class="me-3" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>
            </form>
        </div>
    </div>
</div>
