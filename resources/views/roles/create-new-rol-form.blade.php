<div class="md:grid md:grid-cols-3 md:gap-6">
    <x-section-title>
        <x-slot name="title">{{ __('Create') }} {{ __('Roles') }}</x-slot>
        <x-slot
            name="description">{{ __('Genera un nuevo Rol de Usuario para ser insertado la Base de Datos.') }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form method="POST" action="{{ route('roles.store') }}">
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="grid grid-cols-6 gap-6">
                    @csrf

                    <!-- Rol Name -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="rol_name" value="{{ __('Nombre del Rol') }}" />
                        <x-input id="rol_name" type="text" inputmode="text" pattern="[a-zA-Z]+"
                            class="mt-1 block w-full" name="rol_name" autofocus autocomplete="rol_name" />

                        <x-text-hint for="rol_name" value="{{ __('Only letters without spaces are alowed') }}." />
                        <x-input-error for="rol_name" class="mt-2" />
                    </div>

                    <!-- Rol Description -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="description" value="{{ __('Descripción del Rol') }}" />
                        <x-textarea id="description" name="description" type="text" class="mt-1 block w-full"
                            autofocus />

                        <x-text-hint for="description"
                            value="{{ __('The Descripcion must have between 10 and 120 characters') }}." />
                        <x-input-error for="description" class="mt-2" />
                    </div>

                    <!-- Rol Privileges -->
                    <div class="col-span-6 sm:col-span-4">
                        @foreach ($permissions as $permission)
                        <div class="flex items-start relative">
                            <div class="flex items-center h-5">
                                <x-checkbox id="comments" class="rounded w-4 h-4 border-l-indigo-600" aria-describedby="comments-description"></x-checkbox>
                            </div>
                            <div class="text-sm ml-3">
                                <x-label for="comments">{{ $permission->id }}</x-label>
                                <p id="comments-description" class="text-base">{{ $permission->title }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>

            <div
                class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                <x-action-message class="me-3" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>

                <x-button wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-button>
            </div>
        </form>
    </div>
</div>
