@props(['posts'])

<main>

    <x-posts.featured-card :post="$posts[0]"/>

    @if ($posts->count() > 1)
        @foreach ($posts->skip(1) as $post)
            <x-posts.card :post="$post" />
        @endforeach
    @endif

    <div class="bg-black">
        <div class="mt-6 flex justify-center">
            {{ $posts->links() }}
        </div>
    </div>

</main>
