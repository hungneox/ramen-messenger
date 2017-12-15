<?php

namespace Neox\Lumen\Messenger\Templates;

/**
 * Class ReceiptTemplate
 * @package Neox\Lumen\Messenger\Templates
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
     * Optional. Timestamp of the order in seconds.
     *
     * @var string
     */
    protected $timestamp;

    /**
     * @var array
     */
    protected $address;

    /**
     * @var array
     */
    protected $summary;

    /**
     * @return array
     */
    public function getMessage(): array
    {
        return [
            "attachment" => [
                "type"    => "template",
                "payload" => [
                    "template_type"  => "receipt",
                    "recipient_name" => "Stephane Crozatier",
                    "order_number"   => "12345678902",
                    "currency"       => "USD",
                    "payment_method" => "Visa 2345",
                    "order_url"      => "http://petersapparel.parseapp.com/order?order_id=123456",
                    "timestamp"      => "1428444852",
                    "elements"       => $this->getElementsAsArray()
                ]
            ]
        ];
    }
}
