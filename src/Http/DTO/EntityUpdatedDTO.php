<?php

declare(strict_types=1);

namespace VEY\DataTablesLivewire\Http\DTO;

final class EntityUpdatedDTO
{
    /** @var int $entityId */
    public int $entityId;

    /** @var string $propertyName */
    public string $propertyName;

    /** @var mixed $value */
    public mixed $value;

    public function __construct(int $entityId, string $propertyName, mixed $value)
    {
        $this->entityId = $entityId;
        $this->propertyName = $propertyName;
        $this->value = $value;
    }
}
