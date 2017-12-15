<?php

namespace Neox\Lumen\Messenger\Traits;

trait HasSubtitle
{
    /**
     * @var string
     */
    protected $subtitle;

    /**
     * @return string
     */
    public function getSubtitle(): string
    {
        return $this->subtitle ?? '';
    }

    /**
     * @param string $subtitle
     *
     * @return $this
     */
    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;
        return $this;
    }
}
