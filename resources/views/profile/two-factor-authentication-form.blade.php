<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ __('Two Factor Authentication') }}</h2>
                    <p class="card-text">{{ __('Add additional security to your account using two-factor authentication.') }}</p>

                    <h3 class="card-subtitle mt-3 mb-3">
                        @if ($this->enabled)
                            @if ($showingConfirmation)
                                {{ __('Finish enabling two-factor authentication.') }}
                            @else
                                {{ __('You have enabled two-factor authentication.') }}
                            @endif
                        @else
                            {{ __('You have not enabled two-factor authentication.') }}
                        @endif
                    </h3>

                    <div class="card-text mt-3 text-sm text-muted">
                        <p>{{ __('When two-factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.') }}</p>
                    </div>

                    @if ($this->enabled)
                        @if ($showingQrCode)
                            <div class="mt-4">
                                <p class="font-weight-bold">
                                    @if ($showingConfirmation)
                                        {{ __('To finish enabling two-factor authentication, scan the following QR code using your phone\'s authenticator application or enter the setup key and provide the generated OTP code.') }}
                                    @else
                                        {{ __('Two-factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application or enter the setup key.') }}
                                    @endif
                                </p>
                                <div class="mt-2">
                                    {!! $this->user->twoFactorQrCodeSvg() !!}
                                </div>
                                <div class="mt-2">
                                    <p class="font-weight-bold">{{ __('Setup Key') }}: {{ decrypt($this->user->two_factor_secret) }}</p>
                                </div>

                                @if ($showingConfirmation)
                                    <div class="mt-2">
                                        <label for="code" class="form-label">{{ __('Code') }}</label>
                                        <input id="code" type="text" name="code" class="form-control" inputmode="numeric" autofocus autocomplete="one-time-code"
                                               wire:model="code"
                                               wire:keydown.enter="confirmTwoFactorAuthentication" />
                                        <x-input-error for="code" class="mt-2" />
                                    </div>
                                @endif
                            </div>
                        @endif

                        @if ($showingRecoveryCodes)
                            <div class="mt-4">
                                <p class="font-weight-bold">{{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two-factor authentication device is lost.') }}</p>
                                <div class="mt-2">
                                    <div class="list-group">
                                        @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                                            <div class="list-group-item">{{ $code }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif

                    <div class="mt-4">
                        @if (! $this->enabled)
                            <x-confirms-password wire:then="enableTwoFactorAuthentication">
                                <button class="btn btn-primary" type="button" wire:loading.attr="disabled">
                                    {{ __('Enable') }}
                                </button>
                            </x-confirms-password>
                        @else
                            @if ($showingRecoveryCodes)
                                <x-confirms-password wire:then="regenerateRecoveryCodes">
                                    <button class="btn btn-secondary me-3" type="button" wire:loading.attr="disabled">
                                        {{ __('Regenerate Recovery Codes') }}
                                    </button>
                                </x-confirms-password>
                            @elseif ($showingConfirmation)
                                <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                                    <button class="btn btn-primary me-3" type="button" wire:loading.attr="disabled">
                                        {{ __('Confirm') }}
                                    </button>
                                </x-confirms-password>
                            @else
                                <x-confirms-password wire:then="showRecoveryCodes">
                                    <button class="btn btn-secondary me-3" type="button" wire:loading.attr="disabled">
                                        {{ __('Show Recovery Codes') }}
                                    </button>
                                </x-confirms-password>
                            @endif

                            @if ($showingConfirmation)
                                <x-confirms-password wire:then="disableTwoFactorAuthentication">
                                    <button class="btn btn-secondary" type="button" wire:loading.attr="disabled">
                                        {{ __('Cancel') }}
                                    </button>
                                </x-confirms-password>
                            @else
                                <x-confirms-password wire:then="disableTwoFactorAuthentication">
                                    <button class="btn btn-danger" type="button" wire:loading.attr="disabled">
                                        {{ __('Disable') }}
                                    </button>
                                </x-confirms-password>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
