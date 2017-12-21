<?php

namespace Neox\Ramen\Messenger\Traits;

use Illuminate\Support\Collection;
use Neox\Ramen\Messenger\Buttons\Button;

/**
 * Trait HasButtons
 * @package Neox\Ramen\Messenger\Traits
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
