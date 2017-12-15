<?php

namespace Neox\Lumen\Messenger\Templates\Payload\Buttons;

use Neox\Lumen\Messenger\Templates\Payload\Traits\HasUrl;

/**
 * Class UrlButton
 * @package Neox\Lumen\Messenger\Templates\Payload\Buttons
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
