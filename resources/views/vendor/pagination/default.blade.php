@if ($paginator->hasPages())
    <nav class="w-4/12 min-w-96 container mx-auto px-8 py-4 mb-8 grid grid-cols-5 gap-5 border-4 border-gray-800 rounded-b-xl">
        <ul class="pagination col-span-5 flex justify-center items-center space-x-4 text-gray-300">

            {{-- Skip to Start Link --}}
            @if (!$paginator->onFirstPage())
                <li>
                    <a href="{{ $paginator->url(1) }}" rel="prev" aria-label="@lang('pagination.start')" class="px-1.5 border-2 rounded-l-full uppercase font-semibold bg-gray-900 text-white border-gray-700 hover:bg-gray-600 hover:border-white">&lsaquo;&lsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.start')">
                    <span aria-hidden="true" class="px-1.5 border-2 rounded-l-full uppercase font-semibold text-gray-700 bg-gray-900 border-gray-700">&lsaquo;&lsaquo;</span>
                </li>
            @endif

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true" class="px-2 border-2 rounded-l-full uppercase font-semibold text-gray-700 bg-gray-900 border-gray-700">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="px-2 border-2 rounded-l-full uppercase font-semibold bg-gray-900 text-white border-gray-700 hover:bg-gray-600 hover:border-white">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            {{-- "Three Dots" Separator on the Left --}}
            @if ($paginator->currentPage() > 4)
                <li class="disabled" aria-disabled="true"><span>...</span></li>
            @endif

            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span class="text-sm px-3 py-1 border-2 uppercase font-semibold bg-gray-900 text-white border-white">{{ $page }}</span></li>
                        @elseif ($page >= $paginator->currentPage() - 2 && $page <= $paginator->currentPage() + 2)
                            <li><a href="{{ $url }}" class="text-sm px-3 py-1 border-2 uppercase font-semibold text-white bg-gray-900 border-gray-700 hover:bg-gray-600">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- "Three Dots" Separator on the Right --}}
            @if ($paginator->currentPage() < $paginator->lastPage() - 3)
                <li class="disabled" aria-disabled="true"><span>...</span></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="px-2 border-2 rounded-r-full uppercase font-semibold border-gray-700 text-white bg-gray-900 hover:bg-gray-600 hover:border-white">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true" class="px-2 border-2 rounded-r-full uppercase font-semibold text-white bg-gray-900 border-gray-700">&rsaquo;</span>
                </li>
            @endif

            {{-- Skip to End Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->url($paginator->lastPage()) }}" rel="next" aria-label="@lang('pagination.end')" class="px-1.5 border-2 rounded-r-full uppercase font-semibold border-gray-700 text-white bg-gray-900 hover:bg-gray-600 hover:border-white">&rsaquo;&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.end')">
                    <span aria-hidden="true" class="px-1.5 border-2 rounded-r-full uppercase font-semibold text-white bg-gray-900 border-gray-700">&rsaquo;&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
