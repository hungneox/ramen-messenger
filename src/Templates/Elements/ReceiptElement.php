<?php

namespace Neox\Lumen\Messenger\Templates\Elements;

use Neox\Lumen\Messenger\Traits\HasImageUrl;
use Neox\Lumen\Messenger\Traits\HasSubtitle;
use Neox\Lumen\Messenger\Traits\HasTitle;

class ReceiptElement implements ElementInterface
{
    use HasTitle;
    use HasSubtitle;
    use HasImageUrl;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return ReceiptElement
     */
    public function setQuantity(int $quantity): ReceiptElement
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return ReceiptElement
     */
    public function setPrice(float $price): ReceiptElement
    {
        $this->price = $price;
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
     * @return ReceiptElement
     */
    public function setCurrency(string $currency): ReceiptElement
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            "title"     => $this->getTitle(),
            "subtitle"  => $this->getSubtitle(),
            "quantity"  => $this->getQuantity(),
            "price"     => $this->getPrice(),
            "currency"  => $this->getCurrency(),
            "image_url" => $this->getImageUrl()
        ];
    }
}
