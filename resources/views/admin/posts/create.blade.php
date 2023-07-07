@extends('layout.full')

@section('content')
    <x-dashpage heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" required />
            <x-form.input name="slug" required />

            <x-form.textarea id="excerpt" name="excerpt" height="48" required >{{ old('excerpt') }}</x-form.textarea>
            <x-form.textarea id="body" name="body" height="96" required >{{ old('body') }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required class="border border-gray-800 bg-gray-900 text-white p-2 rounded">
                    @foreach (\App\Models\Category::all() as $category)
                        <option class="bg-gray-900 text-white" value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>


                <x-form.error name="category"/>
            </x-form.field>

            <x-form.input name="published_ad" type="date" required class="datepicker" :value="date('Y-m-d')" />

            <x-form.button>Publish</x-form.button>
        </form>
    </x-dashpage>
@endsection

@section('script')

    <script>
        $(function() {
            let initialDate = "{{ date('Y-m-d') }}";

            $(".datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            });

            $(".datepicker").datepicker("setDate", initialDate);

            $(".datepicker").on("change", function() {
                selectedDate = $(this).val();
            });

            new Quill('textarea#body', {
                modules: {
                    syntax: false
                },
                theme: 'snow'}
            );
            new Quill('textarea#excerpt', {
                modules: {
                    syntax: false
                },
                theme: 'snow'}
            );
        });


    </script>
@endsection
