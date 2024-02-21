<x-form-section submit="createTeam">
    <x-slot name="title">
        {{ __('Team Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create a new team to collaborate with others on projects.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6">
            <x-label value="{{ __('Team Owner') }}" />

            <div class="flex items-center mt-2">
                <img class="w-12 h-12 rounded-full object-cover" src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}">

                <div class="ms-4 leading-tight">
                    <div class="text-gray-900">{{ Str::ucfirst($this->user->name) }} {{ Str::ucfirst($this->user->last_name) }}</div>
                    <div class="text-gray-700 text-sm">{{ $this->user->email }}</div>
                </div>
            </div>
        </div>

        <!-- Team Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Team Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" autofocus />

            <x-text-hint for="name" value="{{ __('The Name must have between 8 and 50 characters') }}." />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Team Description -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="description" value="{{ __('Team Description') }}" />
            <x-textarea id="description" type="text" class="mt-1 block w-full" wire:model="state.description" autofocus />
            
            <x-text-hint for="description" value="{{ __('The Descripcion must have between 10 and 120 characters') }}." />
            <x-input-error for="description" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-button>
            {{ __('Create') }}
        </x-button>
    </x-slot>
</x-form-section>