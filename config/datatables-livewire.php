<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Carbon Formats
    |--------------------------------------------------------------------------
    | The default formats that are used for TimeColumn & DateColumn.
    | You can use the formatting characters from the PHP DateTime class.
    | More info: https://www.php.net/manual/en/datetime.format.php
    |
    */

    'default_time_format' => 'H:i',
    'default_date_format' => 'd/m/Y',
    'default_datetime_format' => 'd/m/Y H:i',

    /*
    |--------------------------------------------------------------------------
    | Default Carbon Formats
    |--------------------------------------------------------------------------
    | The default formats that are used for TimeColumn & DateColumn.
    | You can use the formatting characters from the PHP DateTime class.
    | More info: https://www.php.net/manual/en/datetime.format.php
    |
    */

    'default_time_start' => '0000-00-00',
    'default_time_end' => '9999-12-31',

    // Defaults that work with smalldatetime in SQL Server
    //  'default_time_start' => '1900-01-01',
    //  'default_time_end' => '2079-06-06',

    /*
    |--------------------------------------------------------------------------
    | Surpress Search Highlights
    |--------------------------------------------------------------------------
    | When enabled, matching text won't be highlighted in the search results
    | while searching.
    |
    */

    'suppress_search_highlights' => false,

    /*
    |--------------------------------------------------------------------------
    | Model Namespace
    |--------------------------------------------------------------------------
    | Sets the default namespace to be used when generating a new DataTables
    | component.
    |
    */

    'model_namespace' => 'App',

    /*
    |--------------------------------------------------------------------------
    | Default Sortable
    |--------------------------------------------------------------------------
    | Should a column of a datatable be sortable by default ?
    |
    */

    'default_sortable' => true,

    /*
    |--------------------------------------------------------------------------
    | Default CSS classes
    |--------------------------------------------------------------------------
    |
    | Sets the default classes that will be applied to each row and class
    | if the rowClasses() and cellClasses() functions are not overrided.
    |
    */

    'default_classes' => [
        'row' => [
            'even' => 'divide-x bg-light',
            'odd' => 'divide-x',
            'selected' => 'divide-x',
        ],
        'cell' => 'text-nowrap px-2 py-2',
    ],
];
