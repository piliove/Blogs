@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" style="float:left;border:1px solid gray;width:20px;height:20px;padding-left:10px;"><span>&laquo;</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" style="float:left;border:1px solid gray;width:20px;height:20px;padding-left:10px;" rel="prev">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" style="float:left;border:1px solid gray;width:20px;height:20px;padding-left:10px;text-align:center;"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" style="float:left;border:1px solid gray;width:20px;height:20px;padding-left:10px;text-align:center;line-height:20px;"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" style="float:left;border:1px solid gray;width:20px;height:20px;padding-left:10px;text-align:center;line-height:20px;">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"  style="float:left;border:1px solid gray;width:20px;height:20px;padding-left:10px;">&raquo;</a></li>
        @else
            <li class="disabled" style="float:left;border:1px solid gray;width:20px;height:20px;padding-left:10px;"><span>&raquo;</span></li>
        @endif
    </ul>
    @endif