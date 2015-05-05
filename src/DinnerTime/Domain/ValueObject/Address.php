<?php

namespace DinnerTime\Domain\ValueObject;

use DinnerTime\Domain\Exception\InvalidArgumentException;

/**
 * Class Address
 *
 * @package DinnerTime\Domain\Restaurant
 */
final class Address
{
    /**
     * @var Street
     */
    private $street;

    /**
     * @var City
     */
    private $city;

    /**
     * @var String
     */
    private $country;

    /**
     * @param Street  $street
     * @param City    $city
     * @param Country $country
     *
     * @throws InvalidArgumentException
     */
    public function __construct(Street $street, City $city, Country $country)
    {
        $this->street   = $street;
        $this->city     = $city;
        $this->country  = $country;
    }

    /**
     * @return Street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return String
     */
    public function getCity()
    {
        return (string) $this->city;
    }

    /**
     * @return String
     */
    public function getCountry()
    {
        return (string) $this->country;
    }

    public function __toString()
    {
        $format = <<<ADDR
%s
%s
%s
ADDR;
        return sprintf($format, $this->getCity(), $this->getStreet(), $this->getCountry());
    }
}
