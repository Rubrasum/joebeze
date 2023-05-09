@extends('layout.full')

@section('content')

    <main>

        {{-- Cool  --}}
        <div class="bg-black">
            <div class="w-full relative">
                <div class="top-0 left-0 w-full bg-black bg-opacity-60 flex flex-col justify-between ">
                    <div class="container mx-auto px-16 pt-16 pb-64 mb-16 grid grid-cols-5 gap-5 border-l-2 border-r-2 border-b-2 border-gray-800 rounded-b-xl">
                        <div class="col-span-2 border-l-2 border-t-2 border-gray-800">
                            <img src="your-image-url.jpg" alt="Image" class="w-full h-auto">
                        </div>
                        <div class="col-span-3">
                            <h1 class="text-white text-4xl font-bold">Your Blog Title</h1>
                            <div class="mt-4 space-x-2">
                                <a href="#" class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold" style="font-size: 10px">Updates</a>
                                <a href="#" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold" style="font-size: 10px">Technology</a>
                                <a href="#" class="px-3 py-1 border border-green-300 rounded-full text-green-300 text-xs uppercase font-semibold" style="font-size: 10px">Lifestyle</a>
                            </div>
                            <p class="text-white mt-2">Published on: <span class="font-semibold">May 8, 2023</span></p>
                            <footer class="mt-6">
                                <p class="text-white">Author: <span class="font-semibold">John Doe</span></p>
                                <a href="#" class="text-white underline">Read more</a>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Absolute basic  --}}
{{--        <div class="bg-gray-900">--}}
{{--            <div class="container mx-auto py-8">--}}
{{--                <div class="flex flex-col md:flex-row items-center md:justify-between">--}}
{{--                    <div class="md:w-1/2">--}}
{{--                        <h1 class="text-4xl text-white font-bold leading-tight mb-4">Your Blog Title</h1>--}}
{{--                        <div class="flex flex-wrap mt-4">--}}
{{--                            <a href="#" class="px-3 py-1 bg-blue-500 text-white font-semibold mr-2 mb-2 rounded">Technology</a>--}}
{{--                            <a href="#" class="px-3 py-1 bg-green-500 text-white font-semibold mr-2 mb-2 rounded">Lifestyle</a>--}}
{{--                            <a href="#" class="px-3 py-1 bg-red-500 text-white font-semibold mr-2 mb-2 rounded">Updates</a>--}}
{{--                        </div>--}}
{{--                        <p class="text-gray-400 mt-4">Published on: <span class="font-semibold">May 8, 2023</span></p>--}}
{{--                    </div>--}}
{{--                    <div class="md:w-1/2">--}}
{{--                        <img src="your-image-url.jpg" alt="Image" class="w-full h-auto mb-4 md:mb-0">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <p class="text-gray-400 text-lg mt-6">This is an excerpt from the blog post. It's a brief introduction to the content of the post, giving the reader an idea of what to expect when they click through to read the full article.</p>--}}
{{--                <p class="text-gray-400 text-lg mt-4">This is an excerpt from the blog post. It's a brief introduction to the content of the post, giving the reader an idea of what to expect when they click through to read the full article.</p>--}}
{{--                <p class="text-gray-400 text-lg mt-4">This is an excerpt from the blog post. It's a brief introduction to the content of the post, giving the reader an idea of what to expect when they click through to read the full article.</p>--}}
{{--                <p class="text-gray-400 text-lg mt-4">This is an excerpt from the blog post. It's a brief introduction to the content of the post, giving the reader an idea of what to expect when they click through to read the full article.</p>--}}
{{--                <div class="mt-8 flex justify-between items-center">--}}
{{--                    <p class="text-gray-400">Author: <span class="font-semibold">John Doe</span></p>--}}
{{--                    <a href="#" class="bg-white text-gray-900 px-4 py-2 font-semibold rounded shadow-md hover:bg-gray-200">Read more</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


        {{-- HUGE color and nice featured section --}}
{{--        <div class="bg-gradient-to-r from-purple-800 via-blue-700 to-indigo-800">--}}
{{--            <div class="container mx-auto py-16">--}}
{{--                <div class="flex flex-col lg:flex-row items-center justify-between">--}}
{{--                    <div class="lg:w-1/2 mb-8 lg:mb-0">--}}
{{--                        <h1 class="text-5xl lg:text-7xl text-white font-bold leading-tight mb-6 lg:mb-8">Your Blog Title</h1>--}}
{{--                        <div class="flex flex-wrap">--}}
{{--                            <a href="#" class="px-4 py-2 bg-purple-600 text-white font-semibold mr-4 mb-4 rounded-full">Technology</a>--}}
{{--                            <a href="#" class="px-4 py-2 bg-pink-600 text-white font-semibold mr-4 mb-4 rounded-full">Lifestyle</a>--}}
{{--                            <a href="#" class="px-4 py-2 bg-red-600 text-white font-semibold mr-4 mb-4 rounded-full">Updates</a>--}}
{{--                        </div>--}}
{{--                        <p class="text-white mt-8">Published on: <span class="font-semibold">May 8, 2023</span></p>--}}
{{--                    </div>--}}
{{--                    <div class="lg:w-1/2 relative">--}}
{{--                        <img src="your-image-url.jpg" alt="Image" class="w-full h-auto rounded-lg shadow-lg">--}}
{{--                        <div class="absolute top-0 right-0 mt-4 mr-4 bg-white text-gray-800 px-3 py-1 rounded-full font-semibold text-sm">Featured</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="mt-16 text-white leading-loose">--}}
{{--                    <p class="text-xl mb-8">This is an excerpt from the blog post. It's a brief introduction to the content of the post, giving the reader an idea of what to expect when they click through to read the full article.</p>--}}
{{--                    <p class="text-xl mb-8">This is an excerpt from the blog post. It's a brief introduction to the content of the post, giving the reader an idea of what to expect when they click through to read the full article.</p>--}}
{{--                    <p class="text-xl mb-8">This is an excerpt from the blog post. It's a brief introduction to the content of the post, giving the reader an idea of what to expect when they click through to read the full article.</p>--}}
{{--                    <p class="text-xl mb-8">This is an excerpt from the blog post. It's a brief introduction to the content of the post, giving the reader an idea of what to expect when they click through to read the full article.</p>--}}
{{--                </div>--}}
{{--                <div class="mt-16 flex justify-between items-center">--}}
{{--                    <p class="text-white">Author: <span class="font-semibold">John Doe</span></p>--}}
{{--                    <a href="#" class="bg-white text-gray-800 px-6 py-3 font-semibold rounded-full shadow-lg hover:shadow-xl">Read more</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{-- Bland cards, side by side --}}
{{--        <div class="bg-gray-900">--}}
{{--            <div class="container mx-auto py-12">--}}
{{--                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">--}}
{{--                    <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition duration-300 ease-in-out">--}}
{{--                        <h1 class="text-3xl text-gray-900 font-bold mb-4">Your Blog Title</h1>--}}
{{--                        <div class="flex flex-wrap">--}}
{{--                            <a href="#" class="px-3 py-1 bg-blue-600 text-white font-semibold mr-2 mb-2 rounded-full">Technology</a>--}}
{{--                            <a href="#" class="px-3 py-1 bg-green-600 text-white font-semibold mr-2 mb-2 rounded-full">Lifestyle</a>--}}
{{--                            <a href="#" class="px-3 py-1 bg-red-600 text-white font-semibold mr-2 mb-2 rounded-full">Updates</a>--}}
{{--                        </div>--}}
{{--                        <p class="text-gray-700 mt-8">Published on: <span class="font-semibold">May 8, 2023</span></p>--}}
{{--                        <p class="text-gray-700 mt-8">This is an excerpt from the blog post. It's a brief introduction to the content of the post, giving the reader an idea of what to expect when they click through to read the full article.</p>--}}
{{--                        <p class="text-gray-700 mt-4">This is an excerpt from the blog post. It's a brief introduction to the content of the post, giving the reader an idea of what to expect when they click through to read the full article.</p>--}}
{{--                        <div class="mt-8 flex justify-between items-center">--}}
{{--                            <p class="text-gray-700">Author: <span class="font-semibold">John Doe</span></p>--}}
{{--                            <a href="#" class="bg-gray-700 text-white px-4 py-2 font-semibold rounded-full shadow-md hover:shadow-lg">Read more</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition duration-300 ease-in-out">--}}
{{--                        <img src="your-image-url.jpg" alt="Image" class="w-full h-auto rounded-lg">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </main>

@endsection
