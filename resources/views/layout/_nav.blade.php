<div class="h-30" x-data="{ open: false }"
     style="
        background-image: url('{{ asset('images/bytebeze-banner-tess.png') }} ');
        background-repeat: repeat;"
>
    <div class="container mx-auto px-4">
        <nav class="flex justify-between items-center py-4">
            <div class="w-1/5">
                <a href="/">
                    <img src="/images/bytebeze-logo.png" alt="Logo">
                </a>
            </div>
            <div class="hidden md:flex md:items-center md:w-3/5 justify-center">
                <div class="py-2 px-3 relative flex lg:inline-flex bg-white text-gray-800 border border-transparent hover:border-current">
                    <x-categories.dropdown />
                </div>
                <a href="#" class="bg-white mx-4 text-gray-800 border border-transparent hover:border-current py-2 px-3">Link 1</a>
                <a href="#" class="bg-white mx-4 text-gray-800 border border-transparent hover:border-current py-2 px-3">Link 2</a>
                <a href="#" class="bg-white mx-4 text-gray-800 border border-transparent hover:border-current py-2 px-3">Link 3</a>
                <a href="#" class="bg-white mx-4 text-gray-800 border border-transparent hover:border-current py-2 px-3">Link 4</a>
                <a href="#" class="bg-white mx-4 text-gray-800 border border-transparent hover:border-current py-2 px-3">Link 5</a>
            </div>
            <div class="hidden md:flex md:w-1/5 justify-end">
                <input type="search" placeholder="Search" class="w-3/5 mr-5 rounded-md p-2 bg-gray-700 text-white">
            </div>
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="inline-block cursor-pointer">
                    <svg class="fill-current text-white h-6 w-6" viewBox="0 0 24 24">
                        <path x-show="!open" fill-rule="evenodd" clip-rule="evenodd" d="M4 5h16a1 1 0 010 2H4a1 1 0 110-2zm0 6h16a1 1 0 010 2H4a1 1 0 010-2zm0 6h16a1 1 0 010 2H4a1 1 0 010-2z"/>
                        <path x-show="open" fill-rule="evenodd" clip-rule="evenodd" d="M12.707 17.707a1 1 0 01-1.414 0l-5-5a1 1 0 011.414-1.414L12 14.586l4.293-4.293a1 1 0 111.414 1.414l-5 5z"/>
                    </svg>
                </button>
            </div>
        </nav>

        <div x-show="open" class="md:hidden">
            <div class="border-t border-gray-700 pt-4">
                <a href="#" class="block py-2 px-4 text-white">Link 1</a>
                <a href="#" class="block py-2 px-4 text-white">Link 2</a>
                <a href="#" class="block py-2 px-4 text-white">Link 3</a>
                <a href="#" class="block py-2 px-4 text-white">Link 4</a>
                <a href="#" class="block py-2 px-4 text-white">Link 5</a>
            </div>
            <div class="border-t border-gray-700 pt-4">
                <input type="search" placeholder="Search" class="w-full rounded-md p-2 bg-gray-700 text-white">
            </div>
        </div>
    </div>
</div>
