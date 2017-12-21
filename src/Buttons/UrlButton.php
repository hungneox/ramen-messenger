<?php

namespace Neox\Ramen\Messenger\Buttons;

use Neox\Ramen\Messenger\Traits\HasUrl;

/**
 * Class UrlButton
 * @package Neox\Ramen\Messenger\Buttons
 */
class UrlButton extends Button
{
    use HasUrl;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'type'                 => self::TYPE_WEB_URL,
            'title'                => $this->getTitle(),
            'url'                  => $this->getUrl(),
            "messenger_extensions" => $this->isMessengerExtensions(),
            "webview_height_ratio" => $this->getWebviewHeightRatio(),
        ];
    }
}
