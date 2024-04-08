<x-dropdown>
    <x-slot name="trigger">
        <button class="mr-1 lg:w-64 flex text-left lg:inline-flex border border-gray-300 rounded-lg px-2 py-2 bg-white text-gray-800" >
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : " All Categories" }}

            <x-icon name="down-arrow" class="absolute pointer-events-none " style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item
        href="/?{{ http_build_query(request()->except('category', 'page')) }}"
        :active="request()->query('category') == null"> All Categories </x-dropdown-item>

    @foreach ($categories as $category)
        <x-dropdown-item
            href="?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
            :active="request()->query('category') == $category->slug"
        >{{ ucwords($category->name) }}</x-dropdown-item>
    @endforeach

</x-dropdown>
