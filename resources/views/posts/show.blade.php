@extends('layout.full')

@section('content')

    <main class="bg-black mt-2">
        <article class="container mx-auto p-16 mb-8 border-l-8 border-r-2 border-b-2 border-gray-900 rounded-br-md min-w-48 w-3/4 max-w-screen-lg">
            <div class="col-span-3">
                <h1 class="text-white text-4xl font-bold mb-10">
                {{ $post->title }}
            </div>

            <div class="col-span-2 border-t-2 border-b-2 border-gray-900 text-center flex justify-center items-center space-x-4">
                <p class="my-2 text-white">
                    Published
                    <span class="font-semibold">{{ $post->published_at->toFormattedDateString() }}</span>
                </p>
                <a href="/?category={{ $post->category->slug }}"
                   class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                >{{ $post->category->name }}</a>
            </div>


            <div class="text-white space-y-4 lg:text-lg leading-loose pt-10">{!! $post->body !!}</div>
            </div>
        </article>
    </main>


@endsection
