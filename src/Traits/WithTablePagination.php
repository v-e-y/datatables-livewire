<?php

declare(strict_types=1);

namespace VEY\DataTablesLivewire\Traits;

use Livewire\WithPagination;

trait WithTablePagination {

    use WithPagination;

    public string $paginationName = 'page';

    /**
     * Sets the options to choose from in the `Per Page`dropdown.
     * @var array<int> $perPageOptions
     */
    public array $perPageOptions = [10, 25, 50, 100];

    /**
     * Show all option in the `Per Page` dropdown.
     * @var bool $showAll
     */
    public bool $showAll = true;

    public function previousPage()
    {
        $this->setPage(max($this->paginators[$this->paginationName] - 1, 1), $this->paginationName);
    }

    public function nextPage()
    {
        $this->setPage($this->paginators[$this->paginationName] + 1, $this->paginationName);
    }

    public function gotoPage($page)
    {
        $this->setPage($page, $this->paginationName);
    }

    public function resetPage()
    {
        $this->setPage(1, $this->paginationName);
    }
}
