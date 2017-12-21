<?php

namespace Neox\Ramen\Messenger\Traits;

use Illuminate\Support\Collection;
use Neox\Ramen\Messenger\Templates\Payload\QuickReply;

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
    public function getQuickRepliesAsArray(): array
    {
        return $this->getQuickReplies()->map(function (QuickReply $quickReply) {
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
