@extends('layout.full')

@section('content')
    <x-dashpage heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
        </form>
    </x-dashpage>
@endsection
