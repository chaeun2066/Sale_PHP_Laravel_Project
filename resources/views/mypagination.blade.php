@if (isset($paginator) && $paginator->lastPage() > 1)
  <nav aria-label="Page navigation example">
    <ul class="pagination pagination-sm justify-content-center mymargin5">
      @php
        $interval = isset($interval) ? abs(intval($interval)) : 2;
        $from = $paginator->currentPage() - $interval;
        if ($from < 1) {  $from = 1; }

        $to = $paginator->currentPage() + $interval;
        if ($to > $paginator->lastPage()) { $to = $paginator-> lastPage(); }
      @endphp

      @if ($paginator->currentPage() > 1)
        <li class="page-item">
          <a class="page-link" href="{{ $paginator->url(1) }}" aria-label="First">
            <span aria-hidden="true">◀</span>
          </a>
        </li>

        <li class="page-item">
          <a class="page-link" href="{{ $paginator->url($paginator->currentPage() - 1) }}" aria-label="Previous">
            <span aria-hidden="true">◁</span>
          </a>
        </li>
      @endif

      @for ($i = $from; $i <= $to; $i++)
        @php
          $isCurrentPage = $paginator->currentPage() == $i;
        @endphp
        <li class="page-item {{ $isCurrentPage ? 'active' : '' }}">
          <a class="page-link" href="{{ !$isCurrentPage ? $paginator->url($i) : '#' }}">
            {{ $i }}
          </a>
        </li>
      @endfor
      
      @if ($paginator->currentPage() < $paginator->lastPage())
        <li class="page-item">
          <a class="page-link" href="{{ $paginator->url($paginator->currentPage() + 1) }}" aria-label="Next">
            <span aria-hidden="true">▷</span>
          </a>
        </li>

        <li class="page-item">
          <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" aria-label="Last">
            <span aria-hidden="true">▶</span>
          </a>
        </li>
      @endif 
    </ul>
  </nav>
  @endif