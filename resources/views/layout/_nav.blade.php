<div class="h-30" x-data="{ open: false }"
     style="
        background-image: url('{{ asset('images/bytebeze-banner-tess.png') }} ');
        background-repeat: repeat;"
>
    <div class="container mx-auto px-4">
        <nav class="flex justify-between items-center py-4">
            <div class="w-4/5 sm:w-3/5 md:w-2/5 lg:w-2/5">
                <a href="/">
                    <img src="/images/bytebeze-logo.png" alt="Logo">
                </a>
            </div>
            <div class="hidden lg:flex xl:w-2/5 lg:w-0/5 items-center justify-center">
            </div>
            <div class="hidden lg:flex lg:w-3/5 justify-end">
                <div class="w-2/5 relative flex lg:inline-flex mr-10 lg:mr-5 bg-white text-gray-800 border-2 border-gray-800 hover:border-gray-500 rounded-md">
                    <x-categories.dropdown :post="$post ?? null"/>
                </div>
                <div x-data="{ search: '{{ request('search') }}', category: '{{ request('category') }}' }">
                    <form method="GET" action="#" x-ref="form">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <input type="search"
                               name="search"
                               placeholder="Search"
                               class="border-2 border-gray-800 w-full rounded-md p-2 bg-white text-gray-800"
                               x-model="search"
                               x-on:search="if (!search) $refs.form.submit()"
                               value="{{ request('search') }}"
                        >
                    </form>
                </div>
            </div>
            <div class="lg:hidden w-1/5 flex items-center justify-center">
                <button @click="open = !open" class="inline-block cursor-pointer">
                    <svg class="fill-current text-white h-6 w-6" viewBox="0 0 24 24">
                        <path x-show="!open" fill-rule="evenodd" clip-rule="evenodd" d="M4 5h16a1 1 0 010 2H4a1 1 0 110-2zm0 6h16a1 1 0 010 2H4a1 1 0 010-2zm0 6h16a1 1 0 010 2H4a1 1 0 010-2z"/>
                        <path x-show="open" fill-rule="evenodd" clip-rule="evenodd" d="M12.707 17.707a1 1 0 01-1.414 0l-5-5a1 1 0 011.414-1.414L12 14.586l4.293-4.293a1 1 0 111.414 1.414l-5 5z"/>
                    </svg>
                </button>
            </div>
        </nav>

        <div x-show="open" class="lg:hidden">
            <div class="lg:border-t border-gray-700 pt-4 flex mb-10">
                <div class="w-2/5 relative flex lg:inline-flex mr-10 lg:mr-5 bg-white text-gray-800 border-2 border-gray-800 hover:border-gray-500 rounded-md">
                    <x-categories.dropdown :post="$post ?? null"/>
                </div>
                <div class="w-2/5 relative flex lg:inline-flex mr-10 lg:mr-5 text-gray-800 border-2 border-gray-800 hover:border-gray-500 rounded-md">
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
</div>
