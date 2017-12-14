<?php

namespace Neox\Jarvis\Messenger\Templates;

/**
 * Class ReceiptTemplate
 * @package Neox\Jarvis\Messenger\Templates
 * @https://developers.facebook.com/docs/messenger-platform/reference/template/receipt
 */
class ReceiptTemplate extends GenericTemplate
{
    /**
     * @var string
     */
    protected $recipientName;

    /**
     * @var string
     */
    protected $orderNumber;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $paymentMethod;

    /**
     * @var string
     */
    protected $orderUrl;

    /**
     * @var string
     */
    protected $timestamp;

    /**
     * @return array
     */
    public function getMessage(): array
    {
        return [
            "attachment" => [
                "type"    => "template",
                "payload" => [
                    "template_type" => "receipt",
                    "elements"      => $this->getElementsAsArray()
                ]
            ]
        ];
    }
}
