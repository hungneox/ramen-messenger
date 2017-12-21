<?php

namespace Neox\Ramen\Messenger\Templates;

use Neox\Ramen\Messenger\Traits\HasQuickReplies;
use Neox\Ramen\Messenger\Traits\HasText;

/**
 * Class TextTemplate
 * @package Neox\Ramen\Messenger\Templates
 */
class TextTemplate extends Template
{
    use HasText;
    use HasQuickReplies;


    /**
     * TextTemplate constructor.
     *
     * @param string|null $recipientId
     * @param string|null $text
     */
    public function __construct(
        string $recipientId = null,
        string $text = null,
        array $quickReplies = [])
    {
        $this->text         = $text;
        $this->recipientId  = $recipientId;
        $this->quickReplies = $quickReplies;
    }

    /**
     * @inheritdoc
     */
    public function getMessage(): array
    {
        $data = [
            'text' => $this->getText()
        ];

        if (!empty($this->quickReplies)) {
            $data['quick_replies'] = $this->getQuickRepliesAsArray();
        }

        return $data;
    }
}
