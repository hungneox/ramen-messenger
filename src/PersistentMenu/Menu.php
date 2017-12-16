<?php

namespace Neox\Lumen\Messenger\PersistentMenu;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use Neox\Lumen\Messenger\Buttons\Button;
use Neox\Lumen\Messenger\Traits\HasTitle;

/**
 * Class Menu
 * @package Neox\Lumen\Messenger\PersistentMenu
 */
class Menu implements Arrayable
{
    use HasTitle;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $title;


    /**
     * @var string
     */
    protected $locale;


    /**
     * Menu Item (Nested Menu | Buttons)
     *
     * @var array
     */
    protected $items;

    /**
     * You may disable the composer to make the persistent menu the only way
     * for a person to interact with your Messenger bot. This is useful if your
     * bot has a very specific purpose or set of options.
     *
     * @var bool
     */
    protected $composerInputDisabled;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type ?? '';
    }

    /**
     * @param string $type
     * @return Menu
     */
    public function setType(string $type): Menu
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale ?? 'default';
    }

    /**
     * @param string $locale
     * @return Menu
     */
    public function setLocale(string $locale): Menu
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @return bool
     */
    public function isComposerInputDisabled(): bool
    {
        return $this->composerInputDisabled ?? false;
    }

    /**
     * @param bool $composerInputDisabled
     * @return Menu
     */
    public function setComposerInputDisabled(bool $composerInputDisabled): Menu
    {
        $this->composerInputDisabled = $composerInputDisabled;
        return $this;
    }

    /**
     * @param Button|Menu $item
     *
     * @return Menu
     */
    public function addItem($item): self
    {
        $this->items[] = $item;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getItems(): Collection
    {
        return collect($this->items);
    }

    /**
     * @return array
     */
    public function getItemsAsArray()
    {
        return $this->getItems()->map(function (Arrayable $item) {
            return $item->toArray();
        })->toArray();
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        if (empty($this->getType())) {
            return [
                'locale'                  => $this->getLocale(),
                'composer_input_disabled' => $this->isComposerInputDisabled(),
                'call_to_actions'         => $this->getItemsAsArray()
            ];
        }

        return [
            'title'           => $this->getTitle(),
            'type'            => $this->getType(),
            'call_to_actions' => $this->getItemsAsArray()
        ];
    }
}
