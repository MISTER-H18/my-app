@props(['active'])

@php
    $classes = $active ?? false ? 'block w-full border-l-8 ps-0 pe-0 py-0 px-0 my-1 border-orange-400 bg-orange-50 focus:outline-none focus:text-orange-800 focus:bg-orange-100 focus:border-orange-700 transition duration-150 ease-in-out' : 'block w-full border-l-8 ps-0 pe-0 py-0 px-0 my-1 border-transparent hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
    