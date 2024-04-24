<?php

declare(strict_types=1);

namespace VEY\DataTablesLivewire\Traits;

use VEY\DataTablesLivewire\Http\DTO\TableSiblingCmpDTO;

trait WithSiblingsComponents {
    /** @var array<string> $userHeaderHTMLComponents */
    public array $userHeaderHTMLComponents = [];

    /** @var array<array<string>> $headerLWComponents */
    public array $headerLWComponents = [];

    /**
     * Add footer Livewire components
     * @var array<TableSiblingCmpDTO> $footerLWComponents
     */
    public array $footerLWComponents = [];
}