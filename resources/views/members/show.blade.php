<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show') }} {{ __('Members') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <x-section-title>
                    <x-slot name="title">{{ __('Show') }} {{ __('Members') }}</x-slot>
                    <x-slot name="description">{{ __('Presentación estructurada de los datos del usuario') }}
                        "{{ Str::ucfirst($user->name) }} {{ Str::ucfirst($user->last_name) }}"</x-slot>
                </x-section-title>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div
                        class="grid gap-5 grid-cols-1 grid-flow-row px-4 py-4 bg-white sm:p-4 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <div class="grid grid-rows-1">
                            <!-- Profile Photo -->
                            <div class="col-span-6 sm:col-span-4 justify-self-center">
                                <div class="shrink-0 min-w-60 min-h-60 whitespace-nowrap">
                                    <img class="block w-60 h-60 rounded-full overflow-hidden object-cover"
                                        src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                                </div>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 max-md:grid-rows-1 grid-flow-row gap-2"><!-- grid-rows-1 -->
                            <div class="grid gap-4">
                                <!-- Identity Card -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label class="text-sky-600 text-left font-semibold"
                                        value="{{ __('Identity card') }}:" />
                                    <x-label class="font-normal" value="C.I {{ $user->identity_card }}" />
                                </div>

                                <!-- Name & Last name -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label class="text-sky-600 text-left font-semibold" value="Nombre & Apellido:" />
                                    <x-label class="font-normal"
                                        value="{{ Str::ucfirst($user->name) }} {{ Str::ucfirst($user->last_name) }}" />
                                </div>

                                <!-- Date of Birth -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label class="text-sky-600 text-left font-semibold"
                                        value="{{ __('Date of birth') }}:" />
                                    <x-label class="font-normal"
                                        value="{{ Carbon\Carbon::createFromFormat('Y-m-d', $user->date_of_birth)->format('d/m/Y') }} - ({{ $user->age() }} {{ __('years old') }})" />
                                </div>

                                <!-- Sex -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label class="text-sky-600 text-left font-semibold"
                                        value="{{ __('Sex') }}:" />
                                    <x-label class="font-normal"
                                        value="{{ $user->sex == 1 ? 'Masculino' : 'Femenino' }}" />
                                </div>

                                <!-- Phone Number -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label class="text-sky-600 text-left font-semibold"
                                        value="{{ __('Phone number') }}:" />
                                    <x-label class="font-normal" value="{{ $user->phone_number }}" />
                                </div>
                            </div>

                            <div class="grid gap-4">
                                <!-- Address -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label class="text-sky-600 text-left font-semibold"
                                        value="{{ __('Address') }}:" />
                                    <x-label class="font-normal" value="{{ Str::ucfirst($user->address) }}" />
                                </div>

                                <!-- Occupation -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label class="text-sky-600 text-left font-semibold"
                                        value="{{ __('Occupation') }}:" />
                                    <x-label class="font-normal" value="{{ Str::ucfirst($user->occupation) }}" />
                                </div>

                                <!-- Email -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label class="text-sky-600 text-left font-semibold"
                                        value="{{ __('Email') }}:" />
                                    <x-label class="font-normal" value="{{ $user->email }}" />
                                </div>

                                <!-- Marital Status -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label class="text-sky-600 text-left font-semibold"
                                        value="{{ __('Marital status') }}:" />
                                    <x-label class="font-normal" value="{{ $user->maritalStatus->status_name }}" />
                                </div>

                                <!-- add "display PDF" button here -->
                                <div width="40"
                                    class="grid grid-rows-1 gap-2 px-2 py-3 whitespace-nowrap text-sm font-medium">
                                    <a class="inline-flex items-center justify-center px-4 py-2 bg-sky-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-600 focus:bg-sky-600 active:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                        href="{{ route('members') }}">
                                        {{ __('Volver al Inicio') }}
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
