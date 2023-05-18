@props(['post'])


<div class="bg-black">
    <div class="w-full relative">
        <div class="top-0 left-0 w-full bg-black bg-opacity-60 flex flex-col justify-between border-t-8 border-gray-800">
            <div class="container mx-auto px-16 pt-16 pb-64 mb-8 grid grid-cols-5 gap-5 border-l-8 border-r-2 border-b-2 border-gray-800 rounded-br-md">
                <div class="col-span-2 border-l-2 border-t-2 border-gray-800">
                    <img src="your-image-url.jpg" alt="Image" class="w-full h-auto">
                </div>
                <div class="col-span-3">
                    <h1 class="text-white text-4xl font-bold">{{ $post->title }}</h1>
                    <div class="mt-4 space-x-2">
                        <a href="/?category={{ $post->category->slug }}"
                           class="px-3 py-1 border-2  border-blue-300 rounded-full text-blue-300 text-sm uppercase font-semibold hover:border-blue-100 hover:text-blue-100"
                        >{{ $post->category->name }}</a>
                    </div>
                    <p class="text-white mt-2">Published on: <span class="font-semibold">{{ $post->created_at->diffForHumans() }}</span></p>
                    <footer class="mt-6">
                        <p class="text-white">Author: <span class="font-semibold">{{ $post->author->name }}</span></p>
                        <a href="#" class="text-white underline">Read more</a>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>
