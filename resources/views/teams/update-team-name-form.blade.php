<x-form-section submit="updateTeamName">
    <x-slot name="title">
        {{ __('Team Name') }}
    </x-slot>

    <x-slot name="description">
        {{ __('The team\'s name and owner information.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Team Owner Information -->
        <div class="col-span-6">
            <x-label value="{{ __('Team Owner') }}" />

            <div class="flex items-center mt-2">
                <img class="w-12 h-12 rounded-full object-cover" src="{{ $team->owner->profile_photo_url }}"
                    alt="{{ $team->owner->name }}">

                <div class="ms-4 leading-tight">
                    <div class="text-gray-900">{{ Str::ucfirst($team->owner->name) }} {{ Str::ucfirst($team->owner->last_name) }}</div>
                    <div class="text-gray-700 text-sm">{{ $team->owner->email }}</div>
                </div>
            </div>
        </div>

        <!-- Team Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Team Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" :disabled="!Gate::check('update', $team)" />

                <x-text-hint for="name" value="{{ __('The Name must have between 8 and 50 characters') }}." />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Team Description -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="description" value="{{ __('Team Description') }}" />

            <x-textarea id="description" type="text" class="mt-1 block w-full" wire:model="state.description" :disabled="!Gate::check('update', $team)" />

            <x-text-hint for="description" value="{{ __('The Descripcion must have between 10 and 120 characters') }}." />
            <x-input-error for="description" class="mt-2" />
        </div>

    </x-slot>

    @if (Gate::check('update', $team))
        <x-slot name="actions">
            <x-action-message class="me-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>

            <x-button>
                {{ __('Save') }}
            </x-button>
        </x-slot>
    @endif
</x-form-section>
