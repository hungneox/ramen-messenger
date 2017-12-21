<?php

namespace Neox\Ramen\Messenger\Traits;

use Illuminate\Support\Collection;

trait HasQuickReplies
{
    /**
     * @var array
     */
    protected $quickReplies;

    /**
     * @return Collection
     */
    public function getQuickReplies(): Collection
    {
        return collect($this->quickReplies);
    }

    /**
     * @return array
     */
    public function getButtonsAsArray(): array
    {
        return $this->getQuickReplies()->map(function ($quickReply) {
            return $quickReply->toArray();
        })->toArray();
    }

    /**
     * @param $
     *
     * @return $this
     */
    public function addQuickReply($quickReply)
    {
        $this->quickReplies[] = $quickReply;
        return $this;
    }
}
