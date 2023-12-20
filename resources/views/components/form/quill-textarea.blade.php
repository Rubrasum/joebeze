@props(['name', 'height'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <div
        class="border border-gray-800 bg-gray-900 text-white p-2 w-full rounded-md h-{{ $height }} resize-none"
        name="{{ $name }}"
        id="{{ $name }}"
        required
        {{ $attributes }}
    >{{ $slot ?? old($name) }}</div>

    <x-form.error name="{{ $name }}" />
</x-form.field>

