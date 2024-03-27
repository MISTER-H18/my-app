<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('System Settings') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('system-settings.update-system-information-form')

            <x-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('system-settings.database-backup-form')
            </div>

            <x-section-border />

            <div class="mt-10 sm:mt-0">
                <x-action-section>
                    <x-slot name="title">
                        {{ __('Configurar Roles Existentes') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('Puedes personalizar los roles disponibles en el sistema además de definir permisos para cada uno de ellos') }}.
                    </x-slot>

                    <x-slot name="content">
                        <div class="max-w-xl text-sm text-gray-600">
                            {{ __('Puedes configurar los roles y definir sus permisos por aquí') }}.
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('roles.index') }}"
                                class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Configurar Roles') }}
                            </a>
                        </div>

                    </x-slot>
                </x-action-section>

            </div>

            <x-section-border />

            <div class="mt-10 sm:mt-0">
                <x-action-section>
                    <x-slot name="title">
                        {{ __('Modificar Privilegios de los Usuarios') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('Maneja las crendiales que tiene cada usuario registrado en la Base de Datos a través del rol asignado') }}.
                    </x-slot>

                    <x-slot name="content">
                        <div class="max-w-xl text-sm text-gray-600">
                            {{ __('Ten en cuenta que al cambiar el rol de un usuario, este tendrá acceso a recursos y vistas que le eran previamente restringidas') }}.
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('privileges.index') }}"
                                class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Modificar Credenciales') }}
                            </a>
                        </div>

                    </x-slot>
                </x-action-section>

            </div>

            <x-section-border />
        </div>

    </div>
</x-app-layout>
