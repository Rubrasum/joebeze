@props(['post'])

<div class="bg-black">
    <div class="w-full relative">
        <div class="top-0 left-0 w-full bg-black bg-opacity-60 flex flex-col justify-between">
            <div class="container mx-auto px-4 sm:px-6 lg:px-16 py-5 mb-12 grid items-center
                        md:grid-cols-10 grid-cols-1 gap-5 border-l-8 border-r-2 border-b-4 border-t-8
                        border-gray-800 rounded-br-md">
                <div class="col-span-2 md:col-span-2">
                    <img src="{{ asset('images/' .$post->category->name. '-cat-logo.jpg') }}" alt="Image" class="w-full h-auto border-2 border-gray-800">
                </div>
                <div class="col-span-8 md:col-span-8 flex flex-col md:flex-row">
                    <div class="w-full md:w-2/5 pr-3">
                        <a href="/post/{{ $post->slug }}"><h2 class="text-white text-2xl font-bold">{{ $post->title }}</h2></a>
                        <p class="text-white my-2">Published: <span class="font-semibold">{{ $post->published_at->toFormattedDateString() }}</span></p>
                    </div>
                    <div class="w-full md:w-3/5 text-white mt-4 md:mt-0">
                        <div class="mb-4 text-justify">{!! $post->excerpt !!}</div>
                        <div class="flex justify-between items-center">
                            <div class="space-x-2">
                                <a href="/?category={{ $post->category->slug }}"
                                   class="px-3 py-1 border border-{{ $post->category->color }} rounded-full text-{{ $post->category->color }} text-xs uppercase font-semibold btn-color-cat"
                                >{{ $post->category->name }}</a>
                            </div>
                            <div>
                                <a href="/post/{{ $post->slug }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded btn-read-gray">
                                    Read more
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
