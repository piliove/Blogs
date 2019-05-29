<html>
    <head>
        <style>
            .page-items{
                float:left;
                margin:0px;
            }
        </style>
    </head>
    <body>
    @if ($paginator->hasPages())
    <ul class="paginationss">
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-items">
                <span class="page-link">{{ $element }}</span></li>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-items">
                        <span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-items">
                        <a class="page-link" href="{{ $url }}">
                        {{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-items"><a class="page-link" 
            href="{{ $paginator->nextPageUrl() }}" rel="next">下一页</a></li>
        @endif
    </ul>
    </body>
</html>

