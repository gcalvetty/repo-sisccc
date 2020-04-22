@if ($paginator->hasPages())
<<<<<<< HEAD
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true"><span>@lang('pagination.previous')</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
        @else
            <li class="disabled" aria-disabled="true"><span>@lang('pagination.next')</span></li>
        @endif
    </ul>
=======
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true"><span>@lang('pagination.previous')</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
            @else
                <li class="disabled" aria-disabled="true"><span>@lang('pagination.next')</span></li>
            @endif
        </ul>
    </nav>
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33
@endif
