<?php

namespace Neox\Ramen\Messenger\Traits;

trait HasText
{
    /**
     * @var string
     */
    protected $text;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText(string $text)
    {
        $this->text = $text;

        return $this;
    }
}
