@props(['post'])

<div class="bg-black">
    <div class="w-full relative">
        <div class="top-0 left-0 w-full bg-black bg-opacity-60 flex flex-col justify-between ">
            <div class="container mx-auto px-8 py-5 mb-12 grid
                        grid-cols-10 gap-5 border-l-8 border-r-2 border-b-4 border-t-8
                        border-gray-800 rounded-br-md
                        ">
                <div class="col-span-2 border-l-2 border-t-2 border-gray-800">
                    <img src="your-image-url.jpg" alt="Image" class="w-full h-auto">
                </div>
                <div class="col-span-8 flex">
                    <div class="w-2/5 pr-3">
                        <a href="/post/{{ $post->slug }}"><h2 class="text-white text-2xl font-bold hover:underline">{{ $post->title }}</h2></a>
                        <p class="text-white my-2">Published on: <span class="font-semibold">{{ $post->created_at->diffForHumans() }}</span></p>
                    </div>
                    <div class="w-3/5 text-white">
                        <p class="mb-4 text-justify">{!! $post->excerpt !!}</p>
                        <div class="flex justify-between items-center">
                            <div class="space-x-2">
                                <a href="/?category={{ $post->category->slug }}"
                                   class="px-3 py-1 border border-{{ $post->category->color }} rounded-full text-{{ $post->category->color }} text-xs uppercase font-semibold"
                                >{{ $post->category->name }}</a>
                            </div>
                            <div>
                                <a href="/post/{{ $post->slug }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
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
