<?php

namespace Neox\Lumen\Messenger\Templates\Buttons;

/**
 * Class DefaultActionButton
 * @package Neox\Lumen\Messenger\Templates\Buttons
 */
class DefaultActionButton extends WebUrlButton
{
    /**
     * No title for default button
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'type'                 => self::TYPE_WEB_URL,
            'url'                  => $this->getUrl(),
            "messenger_extensions" => $this->isMessengerExtensions(),
            "webview_height_ratio" => $this->getWebviewHeightRatio(),
        ];
    }
}
