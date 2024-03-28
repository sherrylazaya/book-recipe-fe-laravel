<div class="pagination-container">
    <button class="pagination-button" wire:click="previousPage" @if ($currentPage == 1) disabled @endif>
        <div class=""><i class="ri-arrow-left-s-line"></i></div>
    </button>
    @foreach ($this->getLinks() as $link)
        <button class="btn pagination-button custom-fontsize-content2 {{ $link == $currentPage ? 'selected-pagination' : '' }}" wire:click="goToPage({{ $link }})" @if ($link == $currentPage) disabled @endif>
            <div class="">{{ $link }}</div>
        </button>
    @endforeach
    <button class="pagination-button" wire:click="nextPage" @if ($currentPage == $totalPages) disabled @endif>
        <div class=""><i class="ri-arrow-right-s-line"></i></div>
    </button>
</div>