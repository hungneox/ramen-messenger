<?php

namespace Neox\Lumen\Messenger\Templates\Payload;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class Address
 * @package Neox\Lumen\Messenger\Templates\Receipt
 */
class Address implements Arrayable
{
    /**
     * The street address, line 1.
     *
     * @var string
     */
    protected $street1;

    /**
     * Optional. The street address, line 2.
     *
     * @var string
     */
    protected $street2;

    /**
     * The city name of the address.
     *
     * @var string
     */
    protected $city;

    /**
     * The postal code of the address.
     *
     * @var string
     */
    protected $postalCode;

    /**
     * The state abbreviation for U.S. addresses, or the region/province for non-U.S. addresses.
     *
     * @var string
     */
    protected $state;

    /**
     * The two-letter country abbreviation of the address.
     *
     * @var string
     */
    protected $country;

    /**
     * @return string
     */
    public function getStreet1(): string
    {
        return $this->street1;
    }

    /**
     * @param string $street1
     * @return Address
     */
    public function setStreet1(string $street1): Address
    {
        $this->street1 = $street1;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet2(): string
    {
        return $this->street2 ?? '';
    }

    /**
     * @param string $street2
     * @return Address
     */
    public function setStreet2(string $street2): Address
    {
        $this->street2 = $street2;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Address
     */
    public function setCity(string $city): Address
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     * @return Address
     */
    public function setPostalCode(string $postalCode): Address
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return Address
     */
    public function setState(string $state): Address
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Address
     */
    public function setCountry(string $country): Address
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            "street_1"    => $this->getStreet1(),
            "street_2"    => $this->getStreet2(),
            "city"        => $this->getCity(),
            "postal_code" => $this->getPostalCode(),
            "state"       => $this->getState(),
            "country"     => $this->getCountry()
        ];
    }
}
