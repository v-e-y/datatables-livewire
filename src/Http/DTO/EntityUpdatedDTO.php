<?php

declare(strict_types=1);

namespace VEY\DataTablesLivewire\Http\DTO;

final class EntityUpdatedDTO
{
    /** @var int $entityId */
    public int $entityId;

    /** @var string $propertyName */
    public string $propertyName;


    public function __construct(int $entityId, string $propertyName)
    {
        $this->entityId = $entityId;
        $this->propertyName = $propertyName;
    }
}
