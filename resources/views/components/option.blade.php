@props(['name', 'value'])

<option name="{{ $name }}" value={{ $value }} @if (old( $name ) == $value ) selected @endif>{{ $slot }}</option>