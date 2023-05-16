@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            {{--            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">--}}
            {{--                <span class="page-link" aria-hidden="true" style="background-color: transparent">&lsaquo;</span>--}}
            {{--                <span class="page-link" aria-hidden="true" style="background-color: transparent"><i class="uk-icon-arrow-left" style="color: white"></i></span>--}}
            {{--            </li>--}}

        @else
            {{--            <li class="page-item">--}}
            {{--                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" style="background-color: transparent"><i class="uk-icon-arrow-left" style="color: white"></i></a>--}}
            {{--            </li>--}}
        @endif
        <?php
        $start = $paginator->currentPage() - 1; // show 3 pagination links before current
        $end = $paginator->currentPage() + 1; // show 3 pagination links after current
        if($start < 1) {
            $start = 1; // reset start to 1
            $end += 1;
        }
        if($end >= $paginator->lastPage() ) $end = $paginator->lastPage(); // reset end to last page
        ?>
        @if($start > 1)
            <li class="page-item">
                <a class="page-link paginate_new" href="{{ $paginator->url(1) }}">{{1}}</a>
            </li>
            @if($paginator->currentPage() != 2)
                {{-- "Three Dots" Separator --}}
                <li class="page-item disabled" aria-disabled="true" style="background-color: transparent;margin: 0px -13px 0px 0px;"><span class="page-link" style="background-color: transparent">...</span></li>
            @endif
        @endif
        @for ($i = $start; $i <= $end; $i++)
            <li class="page-item {{ ($paginator->currentPage() == $i) ? 'active' : '' }}" aria-current="page">
                <a class="page-link paginate_new" href="{{ $paginator->url($i) }}">{{$i}}</a>
            </li>
        @endfor
        @if($end < $paginator->lastPage())
            @if($paginator->currentPage() + 1 != $paginator->lastPage())
                {{-- "Three Dots" Separator --}}
                <li class="page-item disabled" aria-disabled="true" style="background-color: transparent;margin: 0px -13px 0px 0px;"><span class="page-link" style="background-color: transparent !important;">...</span></li>
            @endif
            <li class="page-item">
                <a class="page-link paginate_new" href="{{ $paginator->url($paginator->lastPage()) }}">{{$paginator->lastPage()}}</a>
            </li>
        @endif
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            {{--            <li class="page-item" style="background-color: transparent">--}}
            {{--                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" style="background-color: transparent !important;"><i class="uk-icon-arrow-right" style="color: white"></i></a>--}}
            {{--            </li>--}}
        @else
            {{--            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')"style="background-color: transparent">--}}
            {{--                <span class="page-link" aria-hidden="true" style="background-color: transparent"><i class="uk-icon-arrow-right" style="color: white"></i></span>--}}
            {{--            </li>--}}
        @endif
    </ul>
@endif

