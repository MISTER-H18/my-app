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

        <!-- Identity card -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="identity_card" value="{{ __('Identity card') }}" />
            <x-input id="identity_card" type="text" class="mt-1 block w-full" wire:model="state.identity_card"
                autocomplete="identity_card" />
            <x-text-hint for="identity_card" value="{{ __('The ID must have this format') }}: 12345678." />
            <x-input-error for="identity_card" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name"
                autocomplete="name" />
            <x-text-hint for="name" value="{{ __('The name must be lowercase') }}." />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Last name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="last_name" value="{{ __('Last name') }}" />
            <x-input id="last_name" type="text" class="mt-1 block w-full" wire:model="state.last_name"
                autocomplete="last_name" />
            <x-text-hint for="last_name" value="{{ __('The lastname must be lowercase') }}." />
            <x-input-error for="last_name" class="mt-2" />
        </div>

        <!-- Date of birth -->
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

        <!-- Phone number -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="phone_number" value="{{ __('Phone number') }}" />
            <x-input id="phone_number" type="tel" class="mt-1 block w-full" wire:model="state.phone_number"
                autocomplete="phone_number" />
            <x-input-error for="phone_number" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="address" value="{{ __('Address') }}" />
            <x-input id="address" type="text" class="mt-1 block w-full" wire:model="state.address"
                autocomplete="address" />
            <x-input-error for="address" class="mt-2" />
        </div>

        <!-- Marital Status -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="marital_status" value="{{ __('Marital status') }}" />

            <select wire:model="state.marital_status_id"
                class="block mt-1 w-full border-sky-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm"
                id="marital_status" name="marital_status" autofocus>

                @foreach ($marital_statuses as $marital_status)
                    <x-option name="marital_status"
                        value="{{ $marital_status->id }}">{{ $marital_status->status }}</x-option>
                @endforeach

            </select>

            <x-input-error for="marital_status" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="occupation" value="{{ __('Occupation') }}" />
            <x-input id="occupation" type="text" class="mt-1 block w-full" wire:model="state.occupation"
                autocomplete="occupation" />

            {{-- @if (count($occupations) < 8)

                <select wire:model="state.occupation_id"
                    class="block mt-1 w-full border-sky-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm"
                    id="occupation" name="occupation" autofocus>

                    @foreach ($occupations as $occupation)
                        <x-option name="occupation"
                            value="{{ $occupation->id }}">{{ $occupation->job_title }}</x-option>
                    @endforeach

                </select>
            @else
                <div>
                    <style>
                        .select2-container {
                            width: 100% !important;
                        }

                        .select2-container--default .select2-selection--single {
                            height: 42px;
                            padding: 0.5rem 0.75rem;
                            margin-top: 0.25rem;
                            font-size: 1rem;
                            border-color: #0ea5e9;
                            opacity: 1;
                            border-radius: 0.375rem;
                            box-sizing: border-box;
                            border-style: solid;
                        }

                        .select2-container--default .select2-selection--single:focus {
                            border-color: #0ea5e9;
                            outline-color: #0ea5e9;
                            border-width: 2px;
                        }

                        .select2-dropdown.select2-dropdown--below {
                            width: fit-content;
                        }

                        .select2-container .select2-selection--single .select2-selection__rendered {
                            padding-left: 0 !important;
                            color: #030303;
                        }

                        .select2-container--default .select2-selection--single .select2-selection__rendered {
                            line-height: 1.5rem !important;
                        }

                        .select2-container--default .select2-selection--single .select2-selection__arrow {
                            background-color: unset;
                            margin: inherit;
                            width: 40px;
                            height: 42px;
                            position: absolute;
                            top: 0.85rem;
                            right: -0.75rem;
                        }

                        .select2-container--default .select2-results__option--selected {
                            background-color: #ddd;
                        }

                        .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
                            background-color: #ea580c;
                            color: white;
                        }


                        .select2-container--default .select2-search--dropdown .select2-search__field {
                            border-color: #aaa;
                        }

                        [type="search"]:focus {
                            --tw-ring-color: #ea580c !important
                        }
                    </style>

                    <div>
                        <select class="w-full h-full mt-1 text-base rounded-md box-border border border-sky-500"
                            name="occupation" id="select2" wire:model.change="state.occupation_id">

                            @foreach ($occupations as $occupation)
                                <x-option name="occupation" value="{{ $occupation->id }}" wire:model.live="state.occupation_id">{{ $occupation->job_title }}</x-option>
                            @endforeach

                        </select>
                    </div>

                    <script>
                        $(document).ready(function() {

                            $('#select2').select2();
                            $('#select2').on('change', function(e) {
                                let data = $('#select2').select2("val");
                                @this.set('selectedItem', data);
                            });

                            $('b[role="presentation"]').hide();
                            $('.select2-container--default .select2-selection--single .select2-selection__arrow')
                                .append(
                                    '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/></svg>'
                                );
                        });
                    </script>
                </div>

            @endif --}}

            <x-input-error for="occupation" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email"
                autocomplete="email" />
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
