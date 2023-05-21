@props(['posts'])

<main>
    @if (request('page') > 1) {{-- page two and onwards--}}
        @foreach ($posts as $post)
            <x-posts.card :post="$post" />
        @endforeach
    @else
        <x-posts.featured-card :post="$posts[0]"/>

        @if ($posts->count() > 1)
            @foreach ($posts->skip(1) as $post)
                <x-posts.card :post="$post" />
            @endforeach
        @endif

    @endif
        <div class="bg-black">
            <div class="flex justify-center">
                {{ $posts->links('vendor.pagination.default') }}
            </div>
        </div>


</main>
