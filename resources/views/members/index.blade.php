@php
    $table_headers = ['User', 'Rol & Occupation', 'Date of birth', 'Marital status', 'Sex', 'Phone number', 'Address'];
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Members') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (!empty($users) && $users->count())

                <div class="flex flex-row">
                    <div class="block my-4">
                        <a href="{{ route('members.create') }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">{{ __('Add New Record') }}</a>
                    </div>
                </div>

                <form method="GET" action="{{ route('members') }}" accept-charset="UTF-8">
                    <div class="flex md:flex-row flex-col justify-between">
                        <div class="flex flex-row items-center justify-start my-4 mx-2">
                            <p class="text-nowrap whitespace-nowrap text-gray-900 text-left text-base mr-3">
                                {{ __('Show') }}:
                            </p>

                            <select
                                class="block mt-1 w-full border-sky-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm"
                                name="perPage" value="{{ request('perPage') }}" autofocus>
                                <x-option name="perPage" value="5">5</x-option>
                                <x-option name="perPage" value="10">10</x-option>
                                <x-option name="perPage" value="15">15</x-option>
                                <x-option name="perPage" value="20">20</x-option>
                            </select>
                        </div>

                        <div class="block my-4">
                            <div class="min-w-96 relative mt-2 rounded-md shadow-sm">
                                <input type="text" name="search" value="{{ request('search') }}" inputmode="text"
                                    pattern="[A-Za-z0-9 ^,&]+" placeholder="Ingrese el valor del campo deseado"
                                    class="block w-full border-sky-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm">

                                <div class="absolute inset-y-0 right-0 flex items-center">
                                    <button type="submit"
                                        class="h-full w-20 inline-flex items-center justify-center bg-sky-500 border border-transparent rounded-r-md text-xs text-white uppercase hover:bg-sky-600 focus:bg-sky-600 active:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        {{ __('Search') }}
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-hidden sm:-mx-6 lg:-mx-8" id="table">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-auto border-b border-gray-200 sm:rounded-lg">

                                <table class="min-w-full divide-y divide-gray-200 w-full select-none">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="35"
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-sky-500 uppercase tracking-wider">
                                                ID
                                            </th>

                                            @foreach ($table_headers as $header)
                                                <th scope="col"
                                                    class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ __($header) }}
                                                </th>
                                            @endforeach

                                            <th scope="col" width="40"
                                                class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {{ __('Actions') }}
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($users as $user)
                                            <tr class="hover:bg-gray-100 cursor-pointer">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-sky-700">
                                                    {{ $user->id }}
                                                </td>

                                                {{-- Create, view tr is clicked, update, and delete --}}
                                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-900">

                                                    <div class="w-full my-2 flex flex-row items-center">
                                                        <div class="shrink-0 w-11 h-11 whitespace-nowrap">
                                                            <img class="block w-11 h-11 rounded-full overflow-hidden object-cover"
                                                                src="{{ $user->profile_photo_url }}"
                                                                alt="{{ $user->name }}">
                                                        </div>

                                                        <div class="ml-4 text-nowrap text-left">
                                                            <div class="text-gray-900 font-medium">
                                                                {{ Str::ucfirst($user->name) }}
                                                                {{ Str::ucfirst($user->last_name) }}
                                                            </div>
                                                            <div class="text-gray-700 font-normal">
                                                                C.I {{ $user->identity_card }}
                                                            </div>
                                                            <div class="text-gray-600 italic">
                                                                {{ $user->email }}
                                                            </div>
                                                            <div class="px-3 py-4 whitespace-normal text-sm text-gray-900 min-w-60">
                                                                <a href="{{ route('user.pdf',['id' => $user->id ]) }}"
                                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                                                    <i class="fa-solid fa-print"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>

                                                <td class="px-3 py-4 whitespace-normal text-sm text-gray-900 min-w-56">
                                                    <div class="w-full my-2 flex flex-row items-center">
                                                        <div class="text-nowrap text-left">
                                                            <span
                                                                class="bg-orange-100 shadow-md text-orange-600 border border-orange-300 font-medium text-sm py-2 px-2 rounded-md items-center">
                                                                {{ Str::ucfirst($user->userRol->rol_name) }}
                                                            </span>

                                                            <div class="text-gray-700 font-normal mt-3">
                                                                {{ Str::ucfirst($user->occupation) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <div class="w-full my-2 flex flex-row items-center">
                                                        <div class="text-nowrap text-center">
                                                            <div class="text-gray-700 font-normal mb-2">
                                                                {{ $user->date_of_birth }}
                                                            </div>
                                                            <div class="text-gray-600 italic">
                                                                {{ $user->age() }} {{ __('years old') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $user->maritalStatus->status_name }}
                                                </td>

                                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    @if ($user->sex == 1)
                                                        {{ __('Male') }}
                                                    @else
                                                        {{ __('Female') }}
                                                    @endif
                                                </td>

                                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $user->phone_number }}
                                                </td>

                                                <td class="px-3 py-4 whitespace-normal text-sm text-gray-900 min-w-60">
                                                    {{ $user->address }}
                                                </td>

                                                <td
                                                    class="grid grid-rows-1 gap-2 px-2 py-3 whitespace-nowrap text-sm font-medium">
                                                    <a class="inline-flex items-center justify-center px-4 py-2 bg-sky-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-600 focus:bg-sky-600 active:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                                        href="{{ route('members.edit', $user->id) }}">
                                                        {{ __('Edit') }}
                                                    </a>
                                                    @livewire('members.delete-user-modal-confirm', ['user_id' => $user->id])
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th scope="col" width="35"
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-sky-500 uppercase tracking-wider">
                                                ID
                                            </th>

                                            @foreach ($table_headers as $header)
                                                <th scope="col"
                                                    class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ __($header) }}
                                                </th>
                                            @endforeach

                                            <th scope="col" width="40"
                                                class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {{ __('Actions') }}
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full my-4 px-2">
                    {{ $users->onEachSide(3)->links() }}
                </div>
            @else
                <div class="min-w-full min-h-96 flex justify-center items-center">
                    <div class="text-center">
                        <p class="text-orange-800 mb-3">{{ __('No results found') }}</p>
                        <p class="text-gray-500 mb-0">
                            {{ __("No entries were found, check your database if there's any issue.") }}</p>
                        <a href="/dashboard" class="text-orange-800">&larr; {{ __('Go Back to Dashboard') }}</a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        let mouseDown = false;
        let startX, scrollLeft;
        const slider = document.querySelector('#table');

        const startDragging = (e) => {
            mouseDown = true;
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        }

        const stopDragging = (e) => {
            mouseDown = false;
        }

        const move = (e) => {
            e.preventDefault();
            if (!mouseDown) {
                return;
            }
            const x = e.pageX - slider.offsetLeft;
            const scroll = x - startX;
            slider.scrollLeft = scrollLeft - scroll;
        }

        // Add the event listeners
        slider.addEventListener('mousemove', move, false);
        slider.addEventListener('mousedown', startDragging, false);
        slider.addEventListener('mouseup', stopDragging, false);
        slider.addEventListener('mouseleave', stopDragging, false);
    </script>
    <script src="https://kit.fontawesome.com/bf1e73e2b4.js" crossorigin="anonymous"></script>

</x-app-layout>
