@props(['post'])

<div class="bg-black">
    <div class="w-full relative">
        <div class="top-0 left-0 w-full bg-black bg-opacity-60 flex flex-col justify-between ">
            <div class="container mx-auto px-8 py-5 mb-16 grid
                        grid-cols-10 gap-5 border-l-4 border-r-2 border-b-2 border-t-4
                        border-gray-800 rounded-b-xl
                        ">
                <div class="col-span-2 border-l-2 border-t-2 border-gray-800">
                    <img src="your-image-url.jpg" alt="Image" class="w-full h-auto">
                </div>
                <div class="col-span-8 flex">
                    <div class="w-2/5 pr-3">
                        <h2 class="text-white text-2xl font-bold">{{ $post->title }}</h2>
                        <p class="text-white my-2">Published on: <span class="font-semibold">{{ $post->created_at->diffForHumans() }}</span></p>
                        <p class="text-white">Author: <span class="font-semibold">{{ $post->author->name }}</span></p>
                    </div>
                    <div class="w-3/5 text-white">
                        <p class="mb-4 text-justify">{!! $post->excerpt !!}</p>
                        <div class="flex justify-between items-center">
                            <div class="space-x-2">
                                <a href="#" class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold" style="font-size: 10px">Updates</a>
                                <a href="#" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold" style="font-size: 10px">Technology</a>
                                <a href="#" class="px-3 py-1 border border-green-300 rounded-full text-green-300 text-xs uppercase font-semibold" style="font-size: 10px">Lifestyle</a>
                            </div>
                            <div>
                                <a href="#" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    Read more
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 text-white flex items-end justify-center h-full">

                </div>
            </div>
        </div>
    </div>
</div>
