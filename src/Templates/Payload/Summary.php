<?php

namespace Neox\Lumen\Messenger\Templates\Payload;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class Summary
 * @package Neox\Lumen\Messenger\Templates\Receipt
 */
class Summary implements Arrayable
{

    /**
     * Optional. The sub-total of the order.
     *
     * @var float
     */
    protected $subtotal;

    /**
     * Optional. The shipping cost of the order.
     *
     * @var float
     */
    protected $shippingCost;

    /**
     * Optional. The tax of the order.
     *
     * @var float
     */
    protected $totalTax;

    /**
     * The total cost of the order, including sub-total, shipping, and tax.
     * @var float
     */
    protected $totalCost;

    /**
     * @return float
     */
    public function getSubtotal(): float
    {
        return $this->subtotal;
    }

    /**
     * @param float $subtotal
     * @return Summary
     */
    public function setSubtotal(float $subtotal): Summary
    {
        $this->subtotal = $subtotal;
        return $this;
    }

    /**
     * @return float
     */
    public function getShippingCost(): float
    {
        return $this->shippingCost;
    }

    /**
     * @param float $shippingCost
     * @return Summary
     */
    public function setShippingCost(float $shippingCost): Summary
    {
        $this->shippingCost = $shippingCost;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalTax(): float
    {
        return $this->totalTax;
    }

    /**
     * @param float $totalTax
     * @return Summary
     */
    public function setTotalTax(float $totalTax): Summary
    {
        $this->totalTax = $totalTax;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalCost(): float
    {
        return $this->totalCost;
    }

    /**
     * @param float $totalCost
     * @return Summary
     */
    public function setTotalCost(float $totalCost): Summary
    {
        $this->totalCost = $totalCost;
        return $this;
    }


    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'subtotal'      => $this->getSubtotal(),
            'shipping_cost' => $this->getShippingCost(),
            'total_tax'     => $this->getTotalTax(),
            'total_cost'    => $this->getTotalCost()
        ];
    }
}
