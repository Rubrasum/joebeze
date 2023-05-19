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
            <div class="hidden md:flex md:w-4/5 justify-end">
                <p class="
    rounded-md bg-white mx-1 font-semibold text-gray-800 border border-transparent
    select-none hover:border-current py-2 px-3 border-2 border-gray-800">Category:
                </p>
                <div class="relative lg: flex lg:inline-flex mr-10 bg-white text-gray-800 border-2 border-gray-800 hover:border-gray-500 rounded-md">
                    <div x-data="{ show: false }" @click.away="show = false" class="w-full">
                        <div @click="show = !show" class="w-full py-2 pl-3 lg:pr-3 pr-6">
                            <button class="pl-3 mr-2 w-full lg:w-32 flex text-left lg-inline-flex">
                                All Categories
                                <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" height="22" viewBox="0 0 22 22">
                                    <g fill="none" fill-rule="evenodd">
                                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z"></path>
                                        <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                                    </g>
                                </svg>
                            </button>
                        </div>
                        <div x-show="show" class="inset-x-0 py-2 absolute bg-white w-full rounded-b-xl z-50 overflow-auto max-h-52" style="display:none">
                            <a class="block text-left px-3 text-sm leading-6 hover:bg-blue-300 focus:bg-blue-300 focus:text-white bg-blue-500 text-white" href="/?">
                                All Categories
                            </a>
                        </div>
                    </div>
                </div>
                <div x-data="{ search: '', category: '' }">
                    <form method="GET" action="#" x-ref="form">
                        <input type="search" name="search" placeholder="Search" class="border-2 border-gray-800 w-full rounded-md p-2 bg-white text-gray-800" x-model="search" x-on:search="if (!search) $refs.form.submit()" value="">
                    </form>
                </div>
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
                <form method="GET" action="#">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="text"
                           name="search"
                           placeholder="Search"
                           class="w-full rounded-md p-2 bg-gray-700 text-white"
                           value="{{ request('search') }}"
                    >
                </form>
            </div>
        </div>
    </div>
</div>
