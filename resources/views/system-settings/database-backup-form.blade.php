<x-action-section>
    <x-slot name="title">
        {{ __('Database Backup') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Get a backup with the database current state') }}.
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Once you get the database backup, make sure to store it on a safe place') }}.
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="handleModal" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-danger-button>
        </div>

        <x-dialog-modal wire:model.live="display">
            <x-slot name="title">
                {{ __('Database Backup') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to save the current database?') }}

                <div class="mt-4">

                    <x-input type="password" class="mt-1 block w-3/4"
                        placeholder="{{ __('Password') }}" x-ref="password" wire:model="password"
                        wire:keydown.enter="downloadDataBase" />

                    <p class="text-sm text-red-600 mt-2">{{ __($errorResponse) }}</p>
                </div>
                
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('display')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" wire:click="downloadDataBase" wire:loading.attr="disabled">
                    {{ __('Download') }}
                </x-danger-button>
            </x-slot>

        </x-dialog-modal>

    </x-slot>
</x-action-section>
