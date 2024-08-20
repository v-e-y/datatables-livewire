<?php

declare(strict_types=1);

namespace VEY\DataTablesLivewire;

use VEY\DataTablesLivewire\Column;
use VEY\DataTablesLivewire\Enums\ColumnTypesEnum;

/**
 * Class SystemIdColumn
 * @package VEY\DataTablesLivewire
 * @property string $type
 * @property string $label You can skip this property when create column
 */
final class SystemIdColumn extends Column
{
    public $type = ColumnTypesEnum::STRING->value;

    public function __construct()
    {
        $this->hiddenAtAll = true;
        $this->label = '_';
        $this->excludeFromExport();
        return $this;
    }
}
