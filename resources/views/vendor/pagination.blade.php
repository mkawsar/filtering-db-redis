<p class="header-people-count">{{ $total }} people in the list</p>
@if ($paginator->hasPages())
    @if ($paginator->onFirstPage())
        <a class="left-arrow-btn" href="javascript:void(0)">
            <img class="left-arrow-img" src="{{ asset('assets/images/left-arrow.png') }}" alt="left">
        </a>
    @else
        <a class="left-arrow-btn" href="{{ $paginator->previousPageUrl() }}">
            <img class="left-arrow-img" src="{{ asset('assets/images/left-arrow.png') }}" alt="left">
        </a>
    @endif

    <p class="count-page">{{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} of {{ $total }}</p>
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="right-arrow-btn">
            <img class="right-arrow-img" src="{{ asset('assets/images/right-arrow.png') }}" alt="right">
        </a>
    @else
        <a href="javascript:void(0)" class="right-arrow-btn">
            <img class="right-arrow-img" src="{{ asset('assets/images/right-arrow.png') }}" alt="right">
        </a>
    @endif

@endif
