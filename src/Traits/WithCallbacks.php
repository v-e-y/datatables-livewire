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

        if (method_exists($this, 'emit')) {
            $this->emit('fieldEdited', $rowId, $column);
            return;
        }

        if (method_exists($this, 'dispatch')) {
            $this->dispatch('fieldEdited', $rowId, $column);
            return;
        }

        $this->callAfterEntityUpdated(entityId: $rowId, propertyName: $column, value: $value);
    }
}
