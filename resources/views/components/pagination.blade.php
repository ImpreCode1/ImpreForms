<div class="flex items-center justify-between">
    <div class="text-xs text-gray-500">
        Página {{ $paginator->currentPage() }} de {{ $paginator->lastPage() }}
    </div>
    <div class="flex items-center gap-1">
        @if($paginator->onFirstPage())
            <span class="px-2 py-1 text-xs text-gray-400 bg-gray-100 rounded">Ant</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-2 py-1 text-xs bg-white border border-gray-300 rounded hover:bg-gray-50 text-gray-700">Ant</a>
        @endif

        @for($i = 1; $i <= $paginator->lastPage(); $i++)
            @if($i >= $paginator->currentPage() - 1 && $i <= $paginator->currentPage() + 1)
                @if($i == $paginator->currentPage())
                    <span class="px-2 py-1 text-xs bg-indigo-600 text-white rounded">{{ $i }}</span>
                @else
                    <a href="{{ $paginator->url($i) }}" class="px-2 py-1 text-xs bg-white border border-gray-300 rounded hover:bg-gray-50 text-gray-700">{{ $i }}</a>
                @endif
            @endif
        @endfor

        @if($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-2 py-1 text-xs bg-white border border-gray-300 rounded hover:bg-gray-50 text-gray-700">Sig</a>
        @else
            <span class="px-2 py-1 text-xs text-gray-400 bg-gray-100 rounded">Sig</span>
        @endif
    </div>
</div>