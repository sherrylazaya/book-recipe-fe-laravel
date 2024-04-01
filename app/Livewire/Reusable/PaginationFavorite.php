<?php

namespace App\Livewire\Reusable;

use Livewire\Component;

class PaginationFavorite extends Component
{
    public $currentPage = 1;
    public $totalData;
    public $perPage;
    public $totalPages;


    public function mount($totalData){
        $this->perPage = session()->get('entries', 8);
        $this->totalData = $totalData;
        $this->calculateTotalPages();
    }

    public function calculateTotalPages() {
        $this->totalPages = ceil($this->totalData / $this->perPage);
    }

    public function emitPaginationEventMyFavorite(){
        $this->dispatch('paginationMyFavorite', currentPage: $this->currentPage);
    }

    public function previousPage(){
        if ($this->currentPage > 1) {
            $this->currentPage--;
            $this->emitPaginationEventMyFavorite();
        }
    }

    public function nextPage(){
        if ($this->currentPage < $this->totalPages) {
            $this->currentPage++;
            $this->emitPaginationEventMyFavorite();
        }
    }

    public function getLinks()
    {
        $links = [];
        $start = max(1, $this->currentPage - 2);
        $end = min($start + 4, $this->totalPages);

        if ($start > 1) {
            $links[] = 1;
            if ($start > 2) {
                $links[] = '...';
            }
        }

        if ($start <= 2) {
            for ($i = $start; $i <= $end; $i++) {
                $links[] = $i;
            }
        } else {
            $middle = floor(($start + $end) / 2);
            $links[] = $middle - 1;
            $links[] = $middle;
            $links[] = $middle + 1;
        }

        if ($end < $this->totalPages) {
            if ($end < $this->totalPages - 1) {
                $links[] = '...';
            }
            $links[] = $this->totalPages;
        }

        return $links;
    }

    public function goToPage($page){
        if (is_numeric($page)) {
            $this->currentPage = $page;
        } elseif ($page === '...') {
            $links = $this->getLinks();
            $currentPosition = array_search($this->currentPage, $links);
            
            if ($links[$currentPosition] === 4) {
                $this->currentPage = 4;
            } else {
                $newPosition = ($currentPosition + 1) % (count($links) - 1);
                $this->currentPage = $links[$newPosition];
            }
        }
            $this->emitPaginationEventMyFavorite();
    }

    public function render()
    {
        return view('livewire.reusable.pagination-favorite');
    }
}