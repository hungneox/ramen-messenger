<?php

namespace Neox\Lumen\Messenger\Templates\Payload;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class Adjustment
 * @package Neox\Lumen\Messenger\Templates\Payload
 * @see https://developers.facebook.com/docs/messenger-platform/reference/template/receipt#adjustments
 */
class Adjustment implements Arrayable
{
    /**
     * Optional. Name of the adjustment.
     *
     * @var string
     */
    protected $name;

    /**
     * Optional. The amount of the adjustment.
     * @var float
     */
    protected $amount;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return $this
     */
    public function setAmount(float $amount)
    {
        $this->amount = $amount;
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
            'name'   => $this->getName(),
            'amount' => $this->getAmount()
        ];
    }
}
