<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ __('Delete Account') }}</h2>
                    <p class="card-text">{{ __('Permanently delete your account.') }}</p>

                    <div class="mt-3 text-sm text-muted">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                    </div>

                    <div class="mt-5">
                        <button class="btn btn-danger" wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                            {{ __('Delete Account') }}
                        </button>
                    </div>

                    <!-- Delete User Confirmation Modal -->
                    <div class="modal fade" id="confirmDeleteUserModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteUserModalLabel">{{ __('Delete Account') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                    <div class="mt-4">
                                        <input type="password" class="form-control" placeholder="{{ __('Password') }}" wire:model="password" wire:keydown.enter="deleteUser">
                                        <x-input-error for="password" class="mt-2" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                    <button type="button" class="btn btn-danger" wire:click="deleteUser" wire:loading.attr="disabled">{{ __('Delete Account') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
