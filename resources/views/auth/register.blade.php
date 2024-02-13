<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="identity_card" value="{{ __('Identity card') }}" />
                <x-input id="identity_card" class="block mt-1 w-full" type="text" name="identity_card"
                    :value="old('identity_card')" autofocus autocomplete="identity_card" />
                    <x-text-hint for="identity_card" value="{{ __('The ID must have this format') }}: 12345678." />
            </div>

            <div class="mt-4">
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    autofocus autocomplete="name" />
                    <x-text-hint for="name" value="{{ __('The name must be lowercase') }}." />
            </div>

            {{-- <div class="mt-4">
                <x-label for="middle_name" value="{{ __('Middle name') }}" />
                <x-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" :value="old('middle_name')" autofocus autocomplete="middle_name" />
                <x-text-hint for="middle_name" value="{{ __('The middle name must be lowercase') }}." />
            </div> --}}

            <div class="mt-4">
                <x-label for="last_name" value="{{ __('Last name') }}" />
                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                    autofocus autocomplete="last_name" />
                <x-text-hint for="last_name" value="{{ __('The lastname must be lowercase') }}." />
            </div>

            {{-- <div class="mt-4">
                <x-label for="second_last_name" value="{{ __('Second last name') }}" />
                <x-input id="second_last_name" class="block mt-1 w-full" type="text" name="second_last_name" :value="old('second_last_name')" autofocus autocomplete="second_last_name" />
                <x-text-hint for="second_last_name" value="{{ __('The second lastname must be lowercase') }}." />
            </div> --}}

            <div class="mt-4">
                <x-label for="date_of_birth" value="{{ __('Date of birth') }}" />
                <x-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth"
                    :value="old('date_of_birth')" autofocus />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    autofocus autocomplete="email" />
            </div>

            <div class="mt-4">
                <x-label for="sex" value="{{ __('Sex') }}" />

                <select
                    class="block mt-1 w-full border-sky-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm"
                    name="sex" autofocus>
                    <x-option name="sex" value="0">{{ __('Female') }}</x-option>
                    <x-option name="sex" value="1">{{ __('Male') }}</x-option>
                </select>
            </div>

            <div class="mt-4">
                <x-label for="phone_number" value="{{ __('Phone number') }}" />
                <x-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number"
                    :value="old('phone_number')" autofocus autocomplete="phone_number" />
            </div>

            <div class="mt-4">
                <x-label for="address" value="{{ __('Address') }}" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                    autofocus autocomplete="address" />
            </div>

            <div class="mt-4">
                <x-label for="marital_status" value="{{ __('Marital status') }}" />

                <select
                    class="block mt-1 w-full border-sky-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm"
                    name="marital_status" autofocus>

                    @foreach ($marital_statuses as $marital_status)
                        <x-option name="marital_status"
                            value="{{ $marital_status->id }}">{{ $marital_status->status }}</x-option>
                    @endforeach

                </select>
            </div>
            
            <div class="mt-4">
                <x-label for="occupation" value="{{ __('Occupation') }}" />
                <x-input id="occupation" class="block mt-1 w-full" type="text" name="occupation" :value="old('occupation')"
                    autofocus autocomplete="occupation" />
                {{-- @if (count($occupations) < 8)

                    <select
                        class="block mt-1 w-full border-sky-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm"
                        name="occupation" autofocus>

                        @foreach ($occupations as $occupation)
                            <x-option name="occupation"
                                value="{{ $occupation->id }}">{{ $occupation->job_title }}</x-option>
                        @endforeach

                    </select>
                @else
                    @livewire('dropdown-search-bar', [
                        // 'livewireAction' => 'ignore',
                        'optionName' => 'occupation',
                        'options' => $occupations,
                        'valueNameField' => 'id',
                        'slotNameField' => 'job_title',
                    ])
                @endif --}}
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />

                <x-text-hint for="password" value="{{ __('Use at least 8 characters, one uppercase, one lowercase and one number') }}." />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-sky-600 hover:text-orange-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
