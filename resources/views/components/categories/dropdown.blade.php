<x-dropdown>
    <x-slot name="trigger">
        <button class="pl-3 mr-2 w-full lg:w-32 flex text-left lg-inline-flex" >
            {{ isset($currentCategory) ? $currentCategory->name : " All Categories " }}

            <x-icon name="down-arrow" class="absolute pointer-events-none " style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item
        href="/?{{ http_build_query(request()->except('category', 'page')) }}"
        :active="request()->routeIs('home')"> All Categories </x-dropdown-item>

    @foreach ($categories as $category)
        <x-dropdown-item
            href="?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
            :active='request()->is("categories/{$category->slug}")'
        >{{ ucwords($category->name) }}</x-dropdown-item>
    @endforeach

</x-dropdown>
