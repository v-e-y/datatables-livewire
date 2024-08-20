<?php

declare(strict_types=1);

namespace VEY\DataTablesLivewire\Enums;

enum ColumnTypesEnum: string {
    case STRING = 'string';
    case NUMBER = 'number';
    case DATE = 'date';
    case BOOLEAN = 'boolean';
    case LABEL = 'label';
    case JSON = 'json';
    case HIDDEN = 'hidden';
}
