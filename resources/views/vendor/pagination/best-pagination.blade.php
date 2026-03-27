@if ($paginator->hasPages())
    <div class="pagination-custom" id="pagination">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <a class="page-link-custom disabled">
                <i class="bi bi-chevron-left"></i>
            </a>
        @else
            <a class="page-link-custom" href="{{ $paginator->previousPageUrl() }}">
                <i class="bi bi-chevron-left"></i>
            </a>
        @endif

        {{-- Page Numbers --}}
        @foreach ($elements as $element)

            {{-- Dots (...) --}}
            @if (is_string($element))
                <a class="page-link-custom disabled">{{ $element }}</a>
            @endif

            {{-- Page Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="page-link-custom active" href="#">
                            {{ $page }}
                        </a>
                    @else
                        <a class="page-link-custom" href="{{ $url }}">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif

        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a class="page-link-custom" href="{{ $paginator->nextPageUrl() }}">
                <i class="bi bi-chevron-right"></i>
            </a>
        @else
            <a class="page-link-custom disabled">
                <i class="bi bi-chevron-right"></i>
            </a>
        @endif

    </div>
@endif
