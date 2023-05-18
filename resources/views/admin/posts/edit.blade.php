@extends('layout.full')

@section('content')
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
        </form>
    </x-setting>
@endsection
