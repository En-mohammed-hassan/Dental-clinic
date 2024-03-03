@if ($paginator->hasPages())



    <div class="d-flex justify-content-between mt-4">
            {{-- Previous Page Link --}}
            <div class="">
            @if ($paginator->onFirstPage())
                <div class="page-item disabled btn btn-secondary mb-2 " aria-disabled="true">
                    <span class="page-link ">Previous</span>
                </div>
            @else
                <div class="page-item btn btn-secondary mb-2">
                    <a class="page-link " href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        Previous
                    </a>

                </div>
            @endif
        </div>
        <div class="">
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <div class="page-item btn btn-secondary mb-2">
                    <a class="page-link " href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
                </div>
            @else
                <div class="page-item disabled btn btn-secondary mb-2 " aria-disabled="true">
                    <span class="page-link ">Next</span>
                </div>
            @endif
        </div>
        </div>


@endif
