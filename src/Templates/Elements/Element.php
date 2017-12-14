<?php

namespace Neox\Lumen\Messenger\Templates\Elements;

use Neox\Lumen\Messenger\Templates\Buttons\Button;
use Neox\Lumen\Messenger\Templates\Buttons\DefaultActionButton;
use Neox\Lumen\Messenger\Templates\Traits\HasButtons;

/**
 * Class Element
 * @package Neox\Jarvis\Messenger\Templates\Elements
 */
class Element implements ElementInterface
{
    use HasButtons;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $imageUrl;

    /**
     * @var string
     */
    protected $subtitle;

    /**
     * @var DefaultActionButton
     */
    protected $defaultAction;


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @param string $imageUrl
     * @return $this
     */
    public function setImageUrl(string $imageUrl)
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubtitle(): string
    {
        return $this->subtitle;
    }

    /**
     * @param string $subtitle
     * @return $this
     */
    public function setSubtitle(string $subtitle)
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    /**
     * @return DefaultActionButton|null
     */
    public function getDefaultAction(): ?Button
    {
        return $this->defaultAction;
    }

    /**
     * @param DefaultActionButton $defaultAction
     * @return $this
     */
    public function setDefaultAction(DefaultActionButton $defaultAction)
    {
        $this->defaultAction = $defaultAction;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $data = [
            "title"          => $this->getTitle(),
            "image_url"      => $this->getImageUrl(),
            "subtitle"       => $this->getSubtitle(),
            "buttons"        => $this->getButtonsAsArray(),
        ];

        if (!empty($this->getDefaultAction())) {
            $data['default_action'] =  $this->getDefaultAction()->toArray();
        }

        return $data;
    }
}
