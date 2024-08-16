<?php

declare(strict_types=1);

namespace VEY\DataTablesLivewire\Traits;

trait WithCollapseRowCmp
{
    public string|int $collapsedRow = 0;

    public string $collapsedRowLWComponent = '';

    public array $collapsedRowLWProps = [];

    public string $collapsedRowCmpWrapperClasses = 'p-4 border-bottom-dashed border-gray-200';

    /**
     * @param string|int $id Entity ID
     * @return void
     */
    public function setCollapsedRow(string|int $id): void
    {   
        $this->collapsedRow = $id === $this->collapsedRow ? 0 : $id;
    }
}
