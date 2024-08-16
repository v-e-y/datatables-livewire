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
 * 
 * IMPORTANT You should implement method getCollapsedRowLWPropsProperty in your component
 */
trait WithCollapseRowCmp
{
    public string $collapsedRow = '';

    public string $collapsedRowLWComponent = '';

    public string $collapsedRowCmpWrapperClasses = 'p-4 border-bottom-dashed border-gray-200';

    /**
     * @param string $id Entity ID
     * @return void
     */
    public function setCollapsedRow(string $id): void
    {   
        $this->collapsedRow = $id === $this->collapsedRow ? '' : $id;
    }

    /**
     * Get the component properties for the collapsed row
     * @return array<string, mixed>
     */
    public function getCollapsedRowLWPropsProperty(): array
    {
        return [];
    }
}
