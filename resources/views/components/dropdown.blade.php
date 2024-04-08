<div x-data="{ show: false }" @click.away="show = false" class="w-full">
    {{--  trigger  --}}
    <div @click="show = ! show" class="w-full px-2">
        {{ $trigger }}
    </div>
    {{--  Links--}}
    <div x-show="show" class="inset-x-0 py-1 absolute bg-white w-full rounded-b-xl z-50 overflow-auto max-h-52" style="display:none">
        {{ $slot }}
    </div>
</div>
