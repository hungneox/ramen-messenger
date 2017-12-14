<?php

namespace Neox\Lumen\Messenger\Templates\Buttons;

use Neox\Lumen\Messenger\Traits\HasUrl;

/**
 * Class WebUrlButton
 * @package Neox\Lumen\Messenger\Templates\Buttons
 */
class WebUrlButton extends Button
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
