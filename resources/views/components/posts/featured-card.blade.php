@props(['post'])


<div class="bg-black">
    <div class="w-full relative">
        <div class="top-0 left-0 w-full bg-black bg-opacity-60 flex flex-col justify-between border-t-8 border-gray-800">
            <div class="container mx-auto px-16 pt-16 pb-8 mb-8 grid grid-cols-5 gap-5 border-l-8 border-r-2 border-b-2 border-gray-800 rounded-br-md">
                <div class="col-span-2 border-gray-800">
                    <img src="{{ asset('images/' .$post->category->name. '-cat-logo.jpg') }}" alt="Image" class="w-full h-auto border-2 border-gray-800">
                </div>
                <div class="col-span-3">
                    <a href="/post/{{ $post->slug }}"><h1 class="text-white text-4xl font-bold hover:underline">{{ $post->title }}</h1></a>
                    <div class="mt-4 space-x-2">
                        <a href="/?category={{ $post->category->slug }}"
                           class="px-3 py-1 border-2  border-{{ $post->category->color }} rounded-full text-{{ $post->category->color }} text-sm uppercase font-semibold"
                        >{{ $post->category->name }}</a>
                    </div>
                    <div class="flex justify-between items-center mt-2 pt-10">
                        <p class="text-white pt-2">Published: <span class="font-semibold">{{ $post->published_at->diffForHumans() }}</span></p>
                        <footer>
                            <a href="/post/{{ $post->slug }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Read more</a>
                        </footer>
                    </div>
                    <div class="col-span-5 border-gray-800 mt-8 text-white">
                        <p class="mb-4 text-justify text-white">{!! $post->excerpt !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
