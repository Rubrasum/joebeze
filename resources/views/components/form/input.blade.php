@props(['name', 'type' => 'text'])

<x-form.field>
    <x-form.label name="{{ $name }}" class="text-white"/>

    <input class="border border-gray-800 bg-gray-900 text-white p-2 w-full rounded"
           name="{{ $name }}"
           id="{{ $name }}"
           type="{{ $type }}"
        {{ $attributes(['value' => old($name)]) }}
    >

    <x-form.error name="{{ $name }}" class="text-white"/>
</x-form.field>
