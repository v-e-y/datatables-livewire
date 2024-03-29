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

    /** @var string|null $modalBody */
    public string|null $modalBody = null;

    /** @var string|null $modalTitle */
    public ?string $modalTitle = null;

    /** 
     * @var string $modalSize 
     * modal-sm, modal-lg, modal-xl or modal-fullscreen
     */
    public string $modalSize = 'modal-lg';

    /** @var string string $modalButtonStyle */
    public string $modalButtonStyle = 'btn btn-primary';

    /**
     * @return void Reset modal props
     */
    public function resetModalProps(): void
    {
        $this->reset([
            'modalLWComponent',
            'modalLWComponentParams',
            'modalView',
            'modalBody',
            'modalTitle',
        ]);
    }

    /**
     * @return void Send browser event to open modal
     */
    public function openModal(): void
    {
        $this->dispatchBrowserEvent('open_' . $this->modalId);
    }

    /**
     * @return void Send browser event to close modal
     */
    public function closeModal(): void
    {
        $this->resetModalProps();
        $this->dispatchBrowserEvent('close_' . $this->modalId);
    }
}