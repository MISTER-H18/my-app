<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }} {{ __('Rol') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <x-section-title>
                    <x-slot name="title">{{ __('Edit') }} {{ __('Rol') }}</x-slot>
                    <x-slot
                        name="description">{{ __('Aquí puedes editar los registros que desees, los cambios se verán reflejados en la Base de Datos.') }}</x-slot>
                </x-section-title>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form method="POST" action="{{ route('roles.update', $user_rol->id) }}">
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="grid grid-cols-6 gap-6">
                                @csrf
                                @method('PUT')

                                <!-- Rol Name -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label for="rol_name" value="{{ __('Nombre del Rol') }}" />
                                    <x-input id="rol_name" type="text" inputmode="text" pattern="[a-zA-Z]+"
                                        value="{{ Str::ucfirst($user_rol->rol_name) }}" class="mt-1 block w-full"
                                        name="rol_name" autofocus autocomplete="rol_name" />

                                    <x-text-hint for="rol_name"
                                        value="{{ __('Only letters without spaces are alowed') }}." />
                                    <x-input-error for="rol_name" class="mt-2" />
                                </div>

                                <!-- Rol Description -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label for="description" value="{{ __('Descripción del Rol') }}" />
                                    <x-textarea id="description" name="description" type="text"
                                        class="mt-1 block w-full"
                                        autofocus>{{ Str::ucfirst($user_rol->description) }}</x-textarea>

                                    <x-text-hint for="description"
                                        value="{{ __('The Descripcion must have between 10 and 120 characters') }}." />
                                    <x-input-error for="description" class="mt-2" />
                                </div>

                                <!-- Rol Privileges -->
                                <div class="col-span-6 sm:col-span-4">
                                    <div>
                                        input
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div
                            class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            <input type="hidden" name="hidden_id" value="{{ $user_rol->id }}">

                            <x-button>
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
