<?php

declare(strict_types=1);

namespace VEY\DataTablesLivewire\Traits;

/**
 * Trait WithCollapseRowCmp
 * @package VEY\DataTablesLivewire\Traits
 * @property string $collapsedRow
 * @property string $collapsedRowLWComponent
 * @property array<string, mixed> $collapsedRowLWProps
 * @property string $collapsedRowCmpWrapperClasses
 * @method void setCollapsedRow(string $id)
 */
trait WithCollapseRowCmp
{
    public string $collapsedRow = '';

    public string $collapsedRowLWComponent = '';

    /**
     * @example $this->collapsedRowLWProps = ['publisherId' => (int) $this->collapsedRow, 'dateRangeValue' => $drValues];
     * (int) - we need to cast the value to the correct type cos in this component we are using strings
     */
    public array $collapsedRowLWProps = [];

    public string $collapsedRowCmpWrapperClasses = 'p-4 border-bottom-dashed border-gray-200';

    /**
     * @param string $id Entity ID
     * @return void
     */
    public function setCollapsedRow(string $id): void
    {   
        $this->collapsedRow = $id === $this->collapsedRow ? '' : $id;
    }
}
