<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show') }} {{ __('Rol Actual') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <x-section-title>
                    <x-slot name="title">{{ __('Show') }} {{ __('Roles') }}</x-slot>
                    <x-slot
                        name="description">{{ __('Presentación estructurada de los datos del rol de usuario seleccionado') }}
                        "{{ Str::ucfirst($user_rol->rol_name) }}"</x-slot>
                </x-section-title>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div
                        class="grid gap-5 grid-cols-1 grid-flow-row px-4 py-4 bg-white sm:p-4 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <div class="grid md:grid-cols-2 max-md:grid-rows-1 grid-flow-row gap-2">
                            <div class="grid gap-4">
                                <!-- Rol Name -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label class="text-sky-600 text-left font-semibold" value="Nombre del Rol:" />
                                    <x-label class="font-normal" value="{{ Str::ucfirst($user_rol->rol_name) }}" />
                                </div>

                                <!-- Rol Description -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label class="text-sky-600 text-left font-semibold"
                                        value="Descripción del Rol:" />
                                    <x-label class="font-normal" value="{{ Str::ucfirst($user_rol->description) }}" />
                                </div>
                            </div>

                            <div class="grid gap-4">
                                <!-- Created at -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label class="text-sky-600 text-left font-semibold"
                                        value="{{ __('Fecha de Creación') }}:" />
                                    {{-- <x-label class="font-normal" value="{{ Carbon\Carbon::createFromFormat('Y-m-d', $user_rol->created_at)->format('d/m/Y') }}" /> --}}
                                    <x-label class="font-normal" value="{{ $user_rol->created_at }}" />
                                </div>

                                <!-- updated at -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label class="text-sky-600 text-left font-semibold"
                                        value="{{ __('Fecha de Actualización') }}:" />
                                    {{-- <x-label class="font-normal" value="{{ Carbon\Carbon::createFromFormat('Y-m-d', $user_rol->updated_at)->format('d/m/Y') }}" /> --}}
                                    <x-label class="font-normal" value="{{ $user_rol->updated_at }}" />
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-rows-1">
                            @if (!empty($user_rol->permissions()) && $user_rol->permissions->count())
                                <x-label class="text-sky-600 text-left font-semibold mb-3"
                                value="{{ __('Permisos o habilidades') }}:" />
                                <div class="w-full max-h-96 justify-self-center overflow-auto">
                                    <div class="shrink-0 min-w-60 min-h-60 whitespace-nowrap">
                                        @foreach ($user_rol->permissions as $permission)
                                            <!-- Añadir un buscador? -->
                                            <div
                                                class="flex items-start relative border-b-2 border-solid border-neutral-200 py-3">
                                                <div class="ml-3 text-sm leading-4">
                                                    <x-label for="comments" class="font-medium text-orange-500"
                                                        value="{{ str_replace('-', ' ', ucfirst($permission->title)) }}" />
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <h2 class="text-orange-600 text-center font-semibold mb-3">No se Encontraron Permisos Asignados a éste Rol</h2>
                            @endif


                            <a class="inline-flex items-center justify-center px-4 py-2 bg-sky-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-600 focus:bg-sky-600 active:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                href="{{ route('roles.index') }}">
                                {{ __('Volver al Inicio') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
