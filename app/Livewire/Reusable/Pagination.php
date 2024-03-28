<?php

namespace App\Livewire\Reusable;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Pagination extends Component
{

    public $currentPage;
    public $perPage;
    public $totalPages;
    public $data;


    public function mount($initialData, $currentPage)
    {   $this->perPage = session()->get('entries', 8);
        $this->data = $initialData;
        $this->totalPages = $initialData['meta']['last_page'];
        $this->currentPage =$currentPage;
    }

    public function nextPage()
    {
        if ($this->currentPage < $this->totalPages) {
            $this->currentPage++;
            $this->emitPaginationEvent();
        }
    }

    public function previousPage()
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
            $this->emitPaginationEvent();
        }
    }

    public function goToPage($page)
    {
        if (is_numeric($page)) {
            $this->currentPage = $page;
        } elseif ($page === '...') {
            $links = $this->getLinks();
            $currentPosition = array_search($this->currentPage, $links);
            
            if ($links[$currentPosition] === 4) {
                // Jika angka 4 yang ditekan, tetap di tempat tanpa pergeseran
                $this->currentPage = 4;
            } else {
                // Berganti bergiliran ketika '...' ditekan
                $newPosition = ($currentPosition + 1) % (count($links) - 1);
                $this->currentPage = $links[$newPosition];
            }
        }

        $this->emitPaginationEvent();
    }


    private function emitPaginationEvent()
    {
        $this->dispatch('paginationChanged', currentPage: $this->currentPage);
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
    public function render()
    {
        return view('livewire.reusable.pagination');
    }
}
