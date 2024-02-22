@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Update Profile Information') }}
                    </div>
                    <div class="card-body">
                        @livewire('profile.update-profile-information-form')
                    </div>
                </div>
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Update Password') }}
                    </div>
                    <div class="card-body">
                        @livewire('profile.update-password-form')
                    </div>
                </div>
            @endif

            {{-- @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Two Factor Authentication') }}
                    </div>
                    <div class="card-body">
                        @livewire('profile.two-factor-authentication-form')
                    </div>
                </div>
            @endif --}}

            {{-- <div class="card mb-4">
                <div class="card-header">
                    {{ __('Browser Sessions') }}
                </div>
                <div class="card-body">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Delete Account') }}
                    </div>
                    <div class="card-body">
                        @livewire('profile.delete-user-form')
                    </div>
                </div>
            @endif --}}
        </div>
    </div>
</div>
@endsection
