<?php

namespace Neox\Lumen\Messenger\Templates\Buttons;

/**
 * Class Button
 * @package Neox\Jarvis\Messenger\Templates\Buttons
 * @see https://developers.facebook.com/docs/messenger-platform/send-messages/buttons
 */
abstract class Button
{
    const TYPE_WEB_URL       = 'web_url';
    const TYPE_POSTBACK      = 'postback';
    const TYPE_PAYMENT       = 'payment';
    const TYPE_ELEMENT_SHARE = 'element_share';

    protected $types = [
        self::TYPE_WEB_URL,
        self::TYPE_POSTBACK,
        self::TYPE_PAYMENT
    ];

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var bool
     */
    protected $messengerExtensions = false;

    /**
     * @var string
     */
    protected $webviewHeightRatio = "tall";

    /**
     * @var string
     */
    protected $fallbackUrl;

    /**
     * @return bool
     */
    public function isMessengerExtensions(): bool
    {
        return $this->messengerExtensions;
    }

    /**
     * @param bool $messengerExtensions
     * @return Button
     */
    public function setMessengerExtensions(bool $messengerExtensions): Button
    {
        //@TODO https://developers.facebook.com/docs/messenger-platform/webview/extensions
        $this->messengerExtensions = $messengerExtensions;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebviewHeightRatio(): string
    {
        return $this->webviewHeightRatio;
    }

    /**
     * @param string $webviewHeightRatio
     * @return Button
     */
    public function setWebviewHeightRatio(string $webviewHeightRatio): Button
    {
        $this->webviewHeightRatio = $webviewHeightRatio;
        return $this;
    }

    /**
     * @return string
     */
    public function getFallbackUrl(): string
    {
        return $this->fallbackUrl ?? '';
    }

    /**
     * @param string $fallbackUrl
     * @return Button
     */
    public function setFallbackUrl(string $fallbackUrl): Button
    {
        $this->fallbackUrl = $fallbackUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type): Button
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title ?? '';
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): Button
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $type
     *
     * @throws \InvalidArgumentException
     */
    public function assertType(string $type)
    {
        if (!in_array($type, $this->types)) {
            throw new \InvalidArgumentException('Unsupported type');
        }
    }

    /**
     * @return array
     */
    abstract public function toArray(): array;
}
