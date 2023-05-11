@props(['post'])


<div class="bg-black">
    <div class="w-full relative">
        <div class="top-0 left-0 w-full bg-black bg-opacity-60 flex flex-col justify-between border-t-4 border-gray-800">
            <div class="container mx-auto px-16 pt-16 pb-64 mb-8 grid grid-cols-5 gap-5 border-l-4 border-r-2 border-b-2 border-gray-800 rounded-b-xl">
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
