<?php

declare(strict_types=1);

namespace VEY\DataTablesLivewire\Traits;

trait WithModals {

    /** @var bool $useModals */
    public bool $useModals = false;

    /** @var string $modalId */
    public string $modalId = 'data_tables_livewire_modal';

    /** @var string $clickReceiverName */
    public string $clickReceiverName = 'openModal';

    /** @var string|null $modalLWComponent */
    public ?string $modalLWComponent = null;

    /** @var array|null $modalLWComponentParams */
    public ?array $modalLWComponentParams = null;

    /** @var string|null $modalView */
    public ?string $modalView = null;

    /** @var mixed $modalBody */
    public $modalBody = null;

    /** @var string|null $modalTitle */
    public ?string $modalTitle = null;
}