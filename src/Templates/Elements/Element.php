<?php

namespace Neox\Lumen\Messenger\Templates\Elements;

use Neox\Lumen\Messenger\Buttons\DefaultActionButton;
use Neox\Lumen\Messenger\Traits\HasButtons;
use Neox\Lumen\Messenger\Traits\HasImageUrl;
use Neox\Lumen\Messenger\Traits\HasSubtitle;
use Neox\Lumen\Messenger\Traits\HasTitle;

/**
 * Class Element
 * @package Neox\Jarvis\Messenger\Templates\Elements
 */
class Element implements ElementInterface
{
    use HasButtons;
    use HasTitle;
    use HasSubtitle;
    use HasImageUrl;
    /**
     * @var DefaultActionButton
     */
    protected $defaultAction;


    /**
     * @return DefaultActionButton|null
     */
    public function getDefaultAction()
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
