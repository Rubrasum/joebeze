@extends('layout.full')

@section('content')

    @if ($posts->count())

        <x-posts.feed :posts="$posts"/>

    @else
        <p class="text-center">That's embarrassing... No posts found...</p>
    @endif

@endsection
