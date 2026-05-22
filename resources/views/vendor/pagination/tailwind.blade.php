@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex items-center justify-between">
        <div class="flex flex-1 justify-between sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="btn-secondary opacity-50 cursor-not-allowed">Previous</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="btn-secondary">Previous</a>
            @endif
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="btn-secondary">Next</a>
            @else
                <span class="btn-secondary opacity-50 cursor-not-allowed">Next</span>
            @endif
        </div>

        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <p class="text-sm text-powder">
                Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }}
            </p>
            <div>
                <span class="inline-flex rounded-lg">
                    @if ($paginator->onFirstPage())
                        <span class="btn-secondary rounded-r-none opacity-50">&lsaquo;</span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" class="btn-secondary rounded-r-none">&lsaquo;</a>
                    @endif
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span class="btn-secondary rounded-none border-l-0 opacity-50">{{ $element }}</span>
                        @endif
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span class="inline-flex items-center border border-powder-dark bg-charcoal-elevated px-4 py-2 text-sm font-semibold text-powder-light">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="btn-secondary rounded-none border-l-0">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" class="btn-secondary rounded-l-none border-l-0">&rsaquo;</a>
                    @else
                        <span class="btn-secondary rounded-l-none border-l-0 opacity-50">&rsaquo;</span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
