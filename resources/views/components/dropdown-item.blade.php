@props(['active' => 'false'])

@php
    $classes = "block text-left text-black px-3 text-sm leading-6 hover:text-white hover:bg-blue-300 focus:bg-blue-300 focus:text-white";

    if ($active) $classes .= ' bg-blue-500 text-white';
@endphp
<a {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}</a>
