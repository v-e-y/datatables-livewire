<?php

declare(strict_types=1);

namespace VEY\DataTablesLivewire\Traits;

trait WithHeaderComponent {
    /** @var array<string> $userHeaderHTMLComponents */
    public array $userHeaderHTMLComponents = [];

    /** @var array<array<string>> $headerLWComponents */
    public array $headerLWComponents = [];
}