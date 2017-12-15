<?php

namespace Neox\Lumen\Messenger\Templates;

use Illuminate\Support\Collection;
use Neox\Lumen\Messenger\Templates\Payload\Address;
use Neox\Lumen\Messenger\Templates\Payload\Adjustment;
use Neox\Lumen\Messenger\Templates\Payload\Summary;

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
     * @var Address
     */
    protected $address;

    /**
     * @var Summary
     */
    protected $summary;

    /**
     * @var array
     */
    protected $adjustments;

    /**
     * @return string
     */
    public function getRecipientName(): string
    {
        return $this->recipientName;
    }

    /**
     * @param string $recipientName
     * @return ReceiptTemplate
     */
    public function setRecipientName(string $recipientName): ReceiptTemplate
    {
        $this->recipientName = $recipientName;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    /**
     * @param string $orderNumber
     * @return ReceiptTemplate
     */
    public function setOrderNumber(string $orderNumber): ReceiptTemplate
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return ReceiptTemplate
     */
    public function setCurrency(string $currency): ReceiptTemplate
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     * @return ReceiptTemplate
     */
    public function setPaymentMethod(string $paymentMethod): ReceiptTemplate
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderUrl(): string
    {
        return $this->orderUrl;
    }

    /**
     * @param string $orderUrl
     * @return ReceiptTemplate
     */
    public function setOrderUrl(string $orderUrl): ReceiptTemplate
    {
        $this->orderUrl = $orderUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    /**
     * @param string $timestamp
     * @return ReceiptTemplate
     */
    public function setTimestamp(string $timestamp): ReceiptTemplate
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return ReceiptTemplate
     */
    public function setAddress(Address $address): ReceiptTemplate
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return Summary
     */
    public function getSummary(): Summary
    {
        return $this->summary;
    }

    /**
     * @param Summary $summary
     * @return ReceiptTemplate
     */
    public function setSummary(Summary $summary): ReceiptTemplate
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getAdjustments(): Collection
    {
        return collect($this->adjustments);
    }

    /**
     * @return array
     */
    public function getAdjustmentsAsArray(): array
    {
        return $this->getAdjustments()->map(function (Adjustment $adjustment) {
            return $adjustment->toArray();
        })->toArray();
    }

    /**
     * @param Adjustment $adjustment
     * @return $this
     */
    public function addAdjustment(Adjustment $adjustment): ReceiptTemplate
    {
        $this->adjustments[] = $adjustment;
        return $this;
    }

    /**
     * @param array $adjustments
     * @return $this
     */
    public function setAdjustments(array $adjustments): ReceiptTemplate
    {
        $this->adjustments = $adjustments;
        return $this;
    }


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
                    "recipient_name" => $this->getRecipientName(),
                    "order_number"   => $this->getOrderNumber(),
                    "currency"       => $this->getCurrency(),
                    "payment_method" => $this->getPaymentMethod(),
                    "order_url"      => $this->getOrderUrl(),
                    "timestamp"      => $this->getTimestamp(),
                    'address'        => $this->getAddress()->toArray(),
                    'summary'        => $this->getSummary()->toArray(),
                    "adjustments"    => $this->getAdjustmentsAsArray(),
                    "elements"       => $this->getElementsAsArray()
                ]
            ]
        ];
    }
}
