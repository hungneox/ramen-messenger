<?php

namespace Neox\Lumen\Messenger\Traits;

use Illuminate\Support\Collection;
use Neox\Lumen\Messenger\Buttons\Button;

/**
 * Trait HasButtons
 * @package Neox\Lumen\Messenger\Traits
 */
trait HasButtons
{
    /**
     * @var array
     */
    protected $buttons;

    /**
     * @return Collection
     */
    public function getButtons(): Collection
    {
        return collect($this->buttons);
    }

    /**
     * @return array
     */
    public function getButtonsAsArray(): array
    {
        return $this->getButtons()->map(function (Button $button) {
            return $button->toArray();
        })->toArray();
    }

    /**
     * @param $
     *
     * @return $this
     */
    public function addButton(Button $button)
    {
        $this->buttons[] = $button;
        return $this;
    }
}
