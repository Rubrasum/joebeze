@props(['post'])

<div class="bg-black">
    <div class="w-full relative">
        <div class="top-0 left-0 w-full bg-black bg-opacity-60 flex flex-col justify-between ">
            <div
                class="
                            container mx-auto px-8 py-8 mb-16 grid
                            grid-cols-10 gap-5 border-l-4 border-r-2 border-b-2 border-t-4
                            border-gray-800 rounded-b-xl
                            ">
                <div class="col-span-2 border-l-2 border-t-2 border-gray-800">
                    <img src="your-image-url.jpg" alt="Image" class="w-full h-auto">
                </div>
                <div class="col-span-7 flex">
                    <div class="w-2/5 pr-3">
                        <h1 class="text-white text-4xl font-bold">Your Blog Title</h1>
                        <p class="text-white my-2">Published on: <span class="font-semibold">May 8, 2023</span></p>
                        <p class="text-white">Author: <span class="font-semibold">John Doe</span></p>
                    </div>
                    <div class="w-3/5 text-white">
                        <div class="mb-4 space-x-2 pr-4">
                            <a href="#" class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold" style="font-size: 10px">Updates</a>
                            <a href="#" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold" style="font-size: 10px">Technology</a>
                            <a href="#" class="px-3 py-1 border border-green-300 rounded-full text-green-300 text-xs uppercase font-semibold" style="font-size: 10px">Lifestyle</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, te sea brute diceret. Usu efficiendi quaerendum ex, mea te natum animal reformidans. Usu prompta detraxit ei, te postea aperiam per. At ferri evertitur cum, phaedrum prodesset ne quo. Et ius odio posse falli.</p>
                    </div>
                </div>
                <div class="col-span-1 text-white flex items-end justify-center h-full">
                    <a href="#" class="mb-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Read more
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
