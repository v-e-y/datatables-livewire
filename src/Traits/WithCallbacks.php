<?php

declare(strict_types=1);

namespace VEY\DataTablesLivewire\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait WithCallbacks
{
    public function edited($value, $key, $column, $rowId)
    {
        DB::connection($this->connection ?? config('database.default'))
            ->table(Str::before($key, '.'))
            ->where(Str::after($key, '.'), $rowId)
            ->update([$column => $value]);

        $this->emit('fieldEdited', $rowId, $column);

        $this->callAfterEntityUpdated(entityId: $rowId, propertyName: $column, value: $value);
    }
}
