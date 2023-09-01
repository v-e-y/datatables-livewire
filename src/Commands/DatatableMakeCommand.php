<?php

namespace VEY\DataTablesLivewire\Commands;

class DataTableMakeCommand extends MakeDataTableCommand
{
    protected $signature = 'livewire:datatable {name} {--model=}';
}
