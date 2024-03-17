<div class="md:grid md:grid-cols-3 md:gap-6">
    <x-section-title>
        <x-slot name="title">{{ __('Edit') }} {{ __('Members') }}</x-slot>
        <x-slot name="description">{{ __('Create a new record for members and insert it into the database.') }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form method="POST" action="{{ route('members.store') }}">
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="grid grid-cols-6 gap-6">
                    @csrf

                    <!-- Identity Card -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="identity_card" value="{{ __('Identity card') }}" />
                        <x-input id="identity_card" type="text" inputmode="numeric" pattern="[0-9]+" value="{{ $user->identity_card }}"
                            class="mt-1 block w-full disabled:opacity-50" name="identity_card" autofocus
                            autocomplete="identity_card" />

                        <x-text-hint for="identity_card" value="{{ __('The ID must have this format') }}: 12345678." />
                        <x-input-error for="identity_card" class="mt-2" />
                    </div>

                    <!-- Name -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" type="text" inputmode="text" pattern="[a-zA-Z]+"
                            class="mt-1 block w-full" name="name" autofocus autocomplete="name" />

                        <x-text-hint for="name" value="{{ __('Only letters without spaces are alowed') }}." />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <!-- Last Name -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="last_name" value="{{ __('Last name') }}" />
                        <x-input id="last_name" type="text" inputmode="text" pattern="[a-zA-Z]+"
                            class="mt-1 block w-full" name="last_name" autofocus autocomplete="last_name" />

                        <x-text-hint for="last_name" value="{{ __('Only letters without spaces are alowed') }}." />
                        <x-input-error for="last_name" class="mt-2" />
                    </div>

                    <!-- Date of Birth -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="date_of_birth" value="{{ __('Date of birth') }}" />
                        <x-input id="date_of_birth" type="date" class="mt-1 block w-full" name="date_of_birth"
                            autofocus autocomplete="date_of_birth" />

                        <x-input-error for="date_of_birth" class="mt-2" />
                    </div>

                    <!-- Sex -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="sex" value="{{ __('Sex') }}" />
                        <select
                            class="block mt-1 w-full border-sky-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm"
                            id="sex" name="sex" autofocus>
                            <x-option name="sex" value="0">{{ __('Female') }}</x-option>
                            <x-option name="sex" value="1">{{ __('Male') }}</x-option>
                        </select>

                        <x-input-error for="sex" class="mt-2" />
                    </div>

                    <!-- Phone Number -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="phone_number" value="{{ __('Phone number') }}" />
                        <x-input id="phone_number" type="tel" inputmode="numeric" pattern="[0-9]+"
                            class="mt-1 block w-full" name="phone_number" autofocus autocomplete="phone_number" />

                        <x-text-hint for="phone_number" value="{{ __('Example of a phone number') }}: 12345678912." />
                        <x-input-error for="phone_number" class="mt-2" />
                    </div>

                    <!-- Address -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="address" value="{{ __('Address') }}" />
                        <x-input id="address" type="text" class="mt-1 block w-full" name="address" autofocus
                            autocomplete="address" />

                        <x-input-error for="address" class="mt-2" />
                    </div>

                    <!-- Marital Status -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="marital_status_id" value="{{ __('Marital status') }}" />
                        <select
                            class="block mt-1 w-full border-sky-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm"
                            id="marital_status_id" name="marital_status_id" autofocus>

                            @foreach ($marital_statuses as $marital_status)
                                <x-option name="marital_status_id"
                                    value="{{ $marital_status->id }}">{{ $marital_status->status_name }}</x-option>
                            @endforeach
                        </select>

                        <x-input-error for="marital_status" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="occupation" value="{{ __('Occupation') }}" />
                        <x-input id="occupation" type="text" class="mt-1 block w-full" name="occupation"
                            autofocus autocomplete="occupation" />

                        <x-input-error for="occupation" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" type="email" class="mt-1 block w-full" name="email" autofocus
                            autocomplete="email" />

                        <x-text-hint for="email"
                            value="{{ __('Example of the email format: hello@example.com') }}." />
                        <x-input-error for="email" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" type="password" class="mt-1 block w-full" name="password" autofocus
                            autocomplete="password" />

                        <x-text-hint for="password"
                            value="{{ __('Use at least 8 characters, one uppercase, one lowercase and one number') }}." />
                        <x-input-error for="password" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    {{-- <div class="col-span-6 sm:col-span-4">
                         <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                         <x-input id="password_confirmation" type="password" class="mt-1 block w-full"
                             name="password_confirmation" autofocus autocomplete="password_confirmation" />
 
                         <x-input-error for="password_confirmation" class="mt-2" />
                     </div> --}}
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
