<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
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
            </div>
        @endif

        <!-- Identity Card -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="identity_card" value="{{ __('Identity card') }}" />
            <x-input id="identity_card" type="text" inputmode="numeric" pattern="[0-9]+"
                class="mt-1 block w-full disabled:opacity-50" wire:model="state.identity_card"
                autocomplete="identity_card" disabled />
            {{-- <x-text-hint for="identity_card" value="{{ __('The ID must have this format') }}: 12345678." /> --}}
            <x-input-error for="identity_card" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" inputmode="text" pattern="[a-zA-Z]+" class="mt-1 block w-full" wire:model="state.name"
                autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="last_name" value="{{ __('Last name') }}" />
            <x-input id="last_name" type="text" inputmode="text" pattern="[a-zA-Z]+" class="mt-1 block w-full"
                wire:model="state.last_name" autocomplete="last_name" />
            <x-input-error for="last_name" class="mt-2" />
        </div>

        <!-- Date of Birth -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="date_of_birth" value="{{ __('Date of birth') }}" />
            <x-input id="date_of_birth" type="date" class="mt-1 block w-full" wire:model="state.date_of_birth"
                autocomplete="date_of_birth" />
            <x-input-error for="date_of_birth" class="mt-2" />
        </div>

        <!-- Sex -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="sex" value="{{ __('Sex') }}" />

            <select wire:model="state.sex"
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
            <x-input id="phone_number" type="tel" inputmode="numeric" pattern="[0-9]+" class="mt-1 block w-full"
                wire:model="state.phone_number" autocomplete="phone_number" />

            <x-text-hint for="phone_number" value="{{ __('Example of a phone number') }}: 12345678912." />
            <x-input-error for="phone_number" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="address" value="{{ __('Address') }}" />
            <x-input id="address" type="text" inputmode="text" pattern="[A-Za-z0-9 ^,&]+" class="mt-1 block w-full" wire:model="state.address"
                autocomplete="address" />
            <x-input-error for="address" class="mt-2" />
        </div>

        <!-- Marital Status -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="marital_status_id" value="{{ __('Marital status') }}" />

            <select wire:model="state.marital_status_id"
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
            <x-input id="occupation" type="text" inputmode="text" pattern="[a-zA-Z ]+" class="mt-1 block w-full"
                wire:model="state.occupation" autocomplete="occupation" />

            <x-input-error for="occupation" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" inputmode="email" class="mt-1 block w-full"
                wire:model="state.email" autocomplete="email" />

            <x-text-hint for="email" value="{{ __('Example of the email format: hello@example.com') }}." />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !$this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
                        wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
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
