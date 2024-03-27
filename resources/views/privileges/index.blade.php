@php
    $table_headers = ['User', 'Rol', 'Fecha de Creación', 'Fecha de Actualización'];
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modificar Credenciales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (!empty($users) && $users->count())

                <form method="GET" action="{{ route('privileges.index') }}" accept-charset="UTF-8">
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
                                            <th scope="col" width="25"
                                                class="px-1 py-3 bg-gray-50 text-left text-xs font-medium text-sky-500 uppercase">
                                                ID
                                            </th>

                                            @foreach ($table_headers as $header)
                                                <th scope="col"
                                                    class="px-2 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">
                                                    {{ __($header) }}
                                                </th>
                                            @endforeach

                                            <th scope="col" width="100"
                                                class="px-2 py-3 bg-gray-50 text-left text-xs text-nowrap font-medium text-gray-500 uppercase">
                                                {{ __('Modificar Rol') }}
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white divide-gray-200">
                                        @foreach ($users as $user)
                                            <tr class="hover:bg-gray-100 cursor-pointer">
                                                <td class="px-3 py-2 text-sm text-sky-700">
                                                    <div class="w-full">
                                                        {{ $user->id }}
                                                    </div>
                                                </td>
                                                <td class="px-3 py-2 text-sm text-gray-900 w-8">
                                                    <div class="w-full my-2 flex flex-row items-center">
                                                        <div class="shrink-0">
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
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-900 w-8">
                                                    <div class="w-full my-2 flex flex-row items-center">
                                                        <div class="text-nowrap text-center">
                                                            <div class="text-gray-700 font-normal mb-2">
                                                                {{ Str::ucfirst($user->userRol->rol_name) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900 w-10">
                                                    <div class="w-full my-2 flex flex-row items-center">
                                                        <div class="text-nowrap text-left">
                                                            <div class="text-gray-700 font-normal mb-2">
                                                                {{ $user->created_at }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900 w-10">
                                                    <div class="w-full my-2 flex flex-row items-center">
                                                        <div class="text-nowrap text-left">
                                                            <div class="text-gray-700 font-normal mb-2">
                                                                {{ $user->updated_at }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900 w-40">
                                                    <form method="POST"
                                                        action="{{ route('privileges.update', $user->id) }}">
                                                        @method('PUT')
                                                        @csrf

                                                        <select
                                                            class="block mt-1 w-full border-sky-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm"
                                                            name="user_rol_id" autofocus onchange="this.form.submit()">

                                                            @foreach ($user_roles as $user_rol)
                                                                @if ($user_rol->id == $user->user_rol_id)
                                                                    <option name="user_rol_id"
                                                                        value="{{ $user_rol->id }}" selected>
                                                                        {{ $user_rol->rol_name }}
                                                                    </option>
                                                                @else
                                                                    <option name="user_rol_id"
                                                                        value="{{ $user_rol->id }}">
                                                                        {{ $user_rol->rol_name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>

                                                        {{-- <a class="inline-flex items-center justify-center px-4 py-2 bg-sky-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-600 focus:bg-sky-600 active:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                                                href="{{ route('privileges.edit', $user->id) }}">
                                                                {{ __('Edit') }}
                                                            </a> --}}
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th scope="col" width="25"
                                                class="px-1 py-3 bg-gray-50 text-left text-xs font-medium text-sky-500 uppercase">
                                                ID
                                            </th>

                                            @foreach ($table_headers as $header)
                                                <th scope="col"
                                                    class="px-2 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">
                                                    {{ __($header) }}
                                                </th>
                                            @endforeach

                                            <th scope="col" width="100"
                                                class="px-2 py-3 bg-gray-50 text-left text-xs text-nowrap font-medium text-gray-500 uppercase">
                                                {{ __('Modificar Rol') }}
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full my-4 px-2">
                    {{ $users->links() }}
                </div>
            @else
                <div class="min-w-full min-h-96 flex justify-center items-center">
                    <div class="text-center">
                        <p class="text-orange-800 mb-3">{{ __('No results found') }}</p>
                        <p class="text-gray-500 mb-0">
                            {{ __("No entries were found, check your database if there's any issue.") }}</p>
                        <a href="{{ route('privileges.index') }}" class="text-orange-800">&larr;
                            {{ __('Vuelve a Intentarlo') }}</a>
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

</x-app-layout>
