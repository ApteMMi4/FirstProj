@if ($paginator->hasPages())
<ul class="pagination">
  @foreach ($elements as $element)


      {{-- Array Of Links --}}
      @if (is_array($element))
          @foreach ($element as $page => $url)

            @if ($page == $paginator->currentPage())
              <li class="pagination__item active">
                <span class="pagination__link">{{ $page }}</span>
              </li>
            @else
              <li class="pagination__item">
                <a href="{{ $url }}" class="pagination__link">{{ $page }}</a>
              </li>
            @endif

          @endforeach
      @endif
  @endforeach

</ul>

@endif
