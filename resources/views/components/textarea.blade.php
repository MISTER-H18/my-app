@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'max-h-28 min-h-[70px] border-sky-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm']) !!}>

</textarea>
