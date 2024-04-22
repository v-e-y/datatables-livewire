<?php

declare(strict_types=1);

namespace VEY\DataTablesLivewire\Traits;

trait WithSiblingsComponents {
    /** @var array<string> $userHeaderHTMLComponents */
    public array $userHeaderHTMLComponents = [];

    /** @var array<array<string>> $headerLWComponents */
    public array $headerLWComponents = [];

    /** @var array<array<string>> $footerLWComponents */
    public array $footerLWComponents = [];
}