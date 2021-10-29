
@if ($paginator->hasPages())
    <tr>
        <td colspan="7" class="footable-visible">
            <ul class="pagination float-right" style="padding-top: 15px;">
                <li class="footable-page-arrow disabled"><a data-page="first" href="{{ $paginator->firstItem() }}">«</a>
                </li>
                @if ($paginator->onFirstPage())
                    <li class="footable-page-arrow disabled"><a data-page="prev" href="">‹</a></li>
                @else
                    <li class="footable-page-arrow disabled"><a data-page="prev" href="{{ $paginator->previousPageUrl() }}">‹</a></li>
                @endif

                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="footable-page active"><a data-page="0" href="">{{ $page }}</a></li>
                            @else
                                <li class="footable-page"><a data-page="0" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="footable-page-arrow"><a data-page="next" href="{{ $paginator->nextPageUrl() }}">›</a></li>
                @else
                    <li class="footable-page-arrow"><a data-page="next" href="">›</a></li>
                @endif

                <li class="footable-page-arrow"><a data-page="last" href="#last">»</a></li>
            </ul>

            {{-- Next Page Link --}}

        </td>
    </tr>
@endif
