@extends('layout.full')

@section('content')

    @if ($posts->count())

        <x-posts.feed :posts="$posts"/>

    @else
        <div class="flex items-center flex-grow justify-center text-center ">
            <p class="text-2xl md:text-3xl lg:text-4xl text-gray-800-600 font-semibold py-4"
            >... That's embarrassing... No posts found.
            </p>
        </div>

    @endif

@endsection
