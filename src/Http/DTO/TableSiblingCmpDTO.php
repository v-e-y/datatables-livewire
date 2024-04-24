<?php

declare(strict_types=1);

namespace VEY\DataTablesLivewire\Http\DTO;

final class TableSiblingCmpDTO
{
    public string $livewireCmpName;

    public string $cmpWrapperClasses = 'col-auto';

    public array $cmpProps = [];

    /**
     * TableSiblingCmpDTO constructor.
     * @param string $livewireCmpName
     * @param array $cmpProps
     * @param null|string|null $cmpWrapperClasses
     */
    public function __construct(string $livewireCmpName, array $cmpProps = [], null|string $cmpWrapperClasses = null)
    {
        $this->livewireCmpName = $livewireCmpName;

        $this->cmpWrapperClasses = $cmpWrapperClasses ? $cmpWrapperClasses : $this->cmpWrapperClasses;

        $this->cmpProps = $cmpProps;
    }
}
