<?php

declare(strict_types=1);

namespace VEY\DataTablesLivewire;

class NumberColumn extends Column
{
    /** @var string $type */
    public $type = 'number';

    /** @var string $headerAlign */
    public $headerAlign = 'right';

    /** @var string $contentAlign */
    public $contentAlign = 'right';

    /** @var int $round */
    public $round;

    /**
     * @param integer $places
     * @return self
     */
    public function round(int $places = 0): self
    {
        $this->round = $places;

        $this->callback = fn($value) => round($value, $this->round);

        return $this;
    }

    /**
     * @param integer $places
     * @return self
     */
    public function format(int $places = 0): self
    {
        $this->callback = fn($value) => number_format($value, $places, '.', ',');

        return $this;
    }
}
