<?php

namespace Neox\Ramen\Messenger\Templates;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class AbstractMessage
 * @package Neox\Main\Templates
 * @see https://developers.facebook.com/docs/messenger-platform/send-messages/templates
 */
abstract class Template implements Arrayable
{

    /**
     * @var string
     */
    protected $recipientId;


    /**
     * @return string
     */
    public function getRecipientId(): string
    {
        return $this->recipientId;
    }

    /**
     * @param string $recipientId
     */
    public function setRecipientId(string $recipientId)
    {
        $this->recipientId = $recipientId;

        return $this;
    }

    /**
     * @return array
     */
    abstract public function getMessage(): array;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json'    => [
                'recipient' => [
                    'id' => $this->getRecipientId()
                ],
                'message' => $this->getMessage()
            ]
        ];
    }
}
