<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }} {{ __('Roles') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
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

                                    <x-text-hint for="rol_name"
                                        value="{{ __('Only letters without spaces are alowed') }}." />
                                    <x-input-error for="rol_name" class="mt-2" />
                                </div>

                                <!-- Rol Description -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label for="description" value="{{ __('Descripción del Rol') }}" />
                                    <x-textarea id="description" name="description" type="text"
                                        class="mt-1 block w-full" autofocus />

                                    <x-text-hint for="description"
                                        value="{{ __('The Descripcion must have between 10 and 120 characters') }}." />
                                    <x-input-error for="description" class="mt-2" />
                                </div>
                            </div>

                            <!-- Rol Privileges -->
                            <div class="grid grid-rows-1 my-4">
                                @if (!empty($permissions) && $permissions->count())
                                    <x-label class="text-sky-600 text-left font-semibold mb-2"
                                        value="{{ __('Permisos o habilidades') }}:" />
                                    <div class="w-full max-h-96 justify-self-center overflow-y-auto px-2">
                                        @foreach ($permissions as $permission)
                                            <div
                                                class="flex items-start relative border-b-2 border-solid border-neutral-200 py-3">
                                                <div class="flex items-center h-5">
                                                    <x-checkbox name="comments" id="comments" required />
                                                </div>
                                                <div class="ml-3 text-sm leading-4">
                                                    <x-label for="comments" class="font-medium text-sky-500"
                                                        value="{{ $permission->id }}" />
                                                    <p class="text-neutral-600">{{ str_replace('-', ' ', ucfirst($permission->title)) }}.</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <h2 class="text-orange-600 text-center font-semibold mb-3">No se Encontraron Permisos en la Base de Datos.</h2>
                                @endif
                            </div>
                        </div>

                        <div
                            class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
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
