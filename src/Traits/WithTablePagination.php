<?php

declare(strict_types=1);

namespace VEY\DataTablesLivewire\Traits;

use Livewire\WithPagination;

trait WithTablePagination {
    use WithPagination;

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
}
