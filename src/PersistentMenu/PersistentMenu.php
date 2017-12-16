<?php

namespace Neox\Lumen\Messenger\PersistentMenu;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use Neox\Lumen\Messenger\Traits\HasButtons;

/**
 * Requirement:
 * The person must be running Messenger v106 or above on iOS or Android.
 * The Facebook Page the Messenger bot is subscribe to must be published.
 * The Messenger bot must be set to "public" in the app settings.
 * The Messenger bot must have the pages_messaging permission.
 * The Messenger bot must have a get started button set.
 *
 * @see https://developers.facebook.com/docs/messenger-platform/send-messages/persistent-menu
 */
class PersistentMenu implements Arrayable
{
    use HasButtons;

    /**
     * @var array
     */
    protected $menus;

    /**
     * @param Menu $nestedMenu
     * @return PersistentMenu
     */
    public function addMenu(Menu $menu): self
    {
        $this->menus[] = $menu;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getMenus(): Collection
    {
        return collect($this->menus);
    }

    /**
     * @return array
     */
    public function getMenuAsArray(): array
    {
        return $this->getMenus()->map(function (Menu $menu) {
            return $menu->toArray();
        })->toArray();
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json'    => [
                "persistent_menu" => $this->getMenuAsArray()
            ]
        ];
    }
}
