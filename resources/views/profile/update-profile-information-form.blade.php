<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form wire:submit.prevent="updateProfileInformation">
                <h2>{{ __('Profile Information') }}</h2>
                <p>{{ __('Update your account\'s profile information and email address.') }}</p>

                <!-- Profile Photo -->
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div x-data="{photoName: null, photoPreview: null}">
                        <!-- Profile Photo File Input -->
                        <input type="file" id="photo" class="form-control"
                               wire:model.live="photo"
                               x-ref="photo"
                               x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                               " />

                        <label for="photo">{{ __('Photo') }}</label>

                        <!-- Current Profile Photo -->
                        <div class="mt-2" x-show="!photoPreview">
                            <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-circle" style="height: 120px; width: 120px;">
                        </div>

                        <!-- New Profile Photo Preview -->
                        <div class="mt-2" x-show="photoPreview" style="display: none;">
                            <img x-bind:src="photoPreview" alt="Preview" class="rounded-circle" style="height: 120px; width: 120px;">
                        </div>

                        <button class="btn btn-secondary mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                            {{ __('Select A New Photo') }}
                        </button>

                        @if ($this->user->profile_photo_path)
                            <button class="btn btn-secondary mt-2" type="button" wire:click="deleteProfilePhoto">
                                {{ __('Remove Photo') }}
                            </button>
                        @endif

                        <x-input-error for="photo" class="mt-2" />
                    </div>
                @endif

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control" wire:model="state.name" required autocomplete="name" />
                    <x-input-error for="name" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control" wire:model="state.email" required autocomplete="username" />
                    <x-input-error for="email" class="mt-2" />

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && !$this->user->hasVerifiedEmail())
                        <p class="text-sm mt-2">
                            {{ __('Your email address is unverified.') }}
                            <button type="button" class="btn btn-link text-sm" wire:click.prevent="sendEmailVerification">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if ($this->verificationLinkSent)
                            <p class="mt-2 font-medium text-sm text-success">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    @endif
                </div>

                <div>
                    <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="photo">
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
