@if ($paginator->lastPage() > 1)
    <ul class="majesty_pagination">
        <li class="next {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url(1) }}" class=""
               tabindex="-1">NEXT</a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                <a class="" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <li class="previous{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a class="" href="{{ $paginator->url($paginator->currentPage()+1) }}">PREVIOUS</a>
        </li>

    </ul>
@endif
{{--
    <ul class="majesty_pagination">
                                                    <li class="next"><a href="#">NEXT</a></li>
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">4</a></li>
                                                    <li><a href="#">5</a></li>
                                                    <li class="previous"><a href="#">PREVIOUS</a></li>
                                                </ul>
--}}
