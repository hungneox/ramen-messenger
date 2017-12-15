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
     * @var double
     */
    protected $subtotal;

    /**
     * Optional. The shipping cost of the order.
     *
     * @var double
     */
    protected $shippingCost;

    /**
     * Optional. The tax of the order.
     *
     * @var double
     */
    protected $totalTax;

    /**
     * The total cost of the order, including sub-total, shipping, and tax.
     * @var double
     */
    protected $totalCost;

    /**
     * @return double
     */
    public function getSubtotal(): double
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
     * @return double
     */
    public function getShippingCost(): double
    {
        return $this->shippingCost;
    }

    /**
     * @param double $shippingCost
     * @return Summary
     */
    public function setShippingCost(double $shippingCost): Summary
    {
        $this->shippingCost = $shippingCost;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalTax(): double
    {
        return $this->totalTax;
    }

    /**
     * @param float $totalTax
     * @return Summary
     */
    public function setTotalTax(double $totalTax): Summary
    {
        $this->totalTax = $totalTax;
        return $this;
    }

    /**
     * @return double
     */
    public function getTotalCost(): double
    {
        return $this->totalCost;
    }

    /**
     * @param double $totalCost
     * @return Summary
     */
    public function setTotalCost(double $totalCost): Summary
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
        // TODO: Implement toArray() method.
    }
}
