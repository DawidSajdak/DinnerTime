<?php

namespace DinnerTime\Domain;

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
     * @var String
     */
    private $city;

    /**
     * @var String
     */
    private $country;

    /**
     * @param Street $street
     * @param string $city
     * @param string $country
     * @throws InvalidArgumentException
     */
    public function __construct(Street $street, $city, $country)
    {
        $this->street   = $street;

        if (!is_string($city)) {
            throw new InvalidArgumentException("City must be a valid string.");
        }

        if (!is_string($country)) {
            throw new InvalidArgumentException("Country must be a valid string.");
        }

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
        return $this->city;
    }

    /**
     * @return String
     */
    public function getCountry()
    {
        return $this->country;
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
