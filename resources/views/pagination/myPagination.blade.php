<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        ul>li {
            margin: 0 10px;
            font-size: 20px;
            background-color: rgb(25, 240, 115);
            width: 40px;
            height: 40px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
        }

        ul>li.active {
            background-color: rgb(25, 93, 240);

        }

        ul>li>a {
            padding: 14px 14px;
            color: black;
        }
    </style>
</head>

<body>
    <div class="row mt-5">
        <div class="col text-center">
            <ul style="display: flex;list-style: none;">
                @if ($paginator->hasPages())
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                                aria-label="@lang('pagination.previous')">&lsaquo;</a>
                        </li>
                    @endif
                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li>
                            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                                aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                    @else
                        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif
                @endif
            </ul>

        </div>
    </div>

</body>

</html>
