<x-form-section submit="updateSystemInformation">
    <x-slot name="title">
        {{ __('System Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update the current information about the system') }}.
    </x-slot>

    <x-slot name="form">
        <!-- Systems Photo -->
        {{-- <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
            <!-- File Input -->
            <input type="file" id="photo" class="hidden" wire:model.live="photo" x-ref="photo"
                x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

            <x-label for="photo" value="{{ __('Photo') }}" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                    class="rounded-full h-20 w-20 object-cover">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview" style="display: none;">
                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                    x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __('Select A New Photo') }}
            </x-secondary-button>

            @if ($this->user->profile_photo_path)
                <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                    {{ __('Remove Photo') }}
                </x-secondary-button>
            @endif

            <x-input-error for="photo" class="mt-2" />
        </div> --}}

        <!-- System's Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="system_name" value="{{ __("System's name") }}" />
            <x-input id="system_name" type="text" inputmode="text" class="mt-1 block w-full" wire:model="system_name"
                autocomplete="system_name" />
            <x-input-error for="system_name" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
