@if ($paginator->hasPages())
    <nav class="w-4/12 min-w-96 container mx-auto px-8 py-4 mb-8 grid grid-cols-5 gap-5 border-4 border-gray-800 rounded-b-xl">
        <ul class="pagination col-span-5 flex justify-center items-center space-x-4 text-gray-300">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true" class="px-3 py-0.5 border-2 border-gray-700 rounded-l-full text-white text-xs uppercase font-semibold bg-gray-900">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="px-3 py-0.5 border-2 border-white rounded-l-full text-white text-xs uppercase font-semibold hover:bg-gray-600">&lsaquo;</a>
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
                            <li class="active" aria-current="page"><span class="px-3 py-1 border-2 border-gray-700 rounded-full text-white text-xs uppercase font-semibold bg-gray-900" style="font-size: 10px">{{ $page }}</span></li>
                        @elseif ($page >= $paginator->currentPage() - 2 && $page <= $paginator->currentPage() + 2)
                            <li><a href="{{ $url }}" class="px-3 py-1 border-2 border-white rounded-full text-white text-xs uppercase font-semibold bg-gray-900 hover:bg-gray-600" style="font-size: 10px">{{ $page }}</a></li>
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
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="px-3 py-0.5 border-2 border-white rounded-r-full text-white text-xs uppercase font-semibold bg-gray-900 hover:bg-gray-600">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true" class="px-3 py-0.5 border-2 border-gray-700 rounded-r-full text-white text-xs uppercase font-semibold bg-gray-900">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
