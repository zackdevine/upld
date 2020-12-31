@if ($paginator->hasPages())
    <nav class="pagination" role="navigation" aria-label="pagination">

        @if ($paginator->onFirstPage())
            <a class="pagination-previous" title="You're already on the first page!" disabled>
                <span class="icon">
                    <i class="fad fa-chevron-left"></i>
                </span>
            </a>
        @else
            <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}">
                <span class="icon">
                    <i class="fad fa-chevron-left"></i>
                </span>
            </a>
        @endif
        
        @if ($paginator->hasMorePages())
            <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}">
                <span class="icon">
                    <i class="fad fa-chevron-right"></i>
                </span>
            </a>
        @else
            <a class="pagination-next" title="You're already on the last page!" disabled>
                <span class="icon">
                    <i class="fad fa-chevron-right"></i>
                </span>
            </a>
        @endif

        <ul class="pagination-list">

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <span class="pagination-ellipsis">
                            <span class="icon">
                                <i class="fad fa-ellipsis-h"></i>
                            </span>
                        </span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <a class="pagination-link is-current" aria-label="Page {{ $page }}" aria-current="page">{{ $page }}</a>
                            </li>
                        @else
                            <li>
                                <a class="pagination-link" aria-label="Page {{ $page }}" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

        </ul>

    </nav>
@endif