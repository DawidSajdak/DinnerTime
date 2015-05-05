<?php

namespace DinnerTime\Domain\ValueObject;

use DinnerTime\Domain\Exception\InvalidArgumentException;

/**
 * Class City
 *
 * @package DinnerTime\Domain\ValueObject
 */
class City
{
    /**
     * @var string
     */
    private $city;

    /**
     * @param string $city
     *
     * @throws InvalidArgumentException
     */
    public function __construct($city)
    {
        if (!is_string($city)) {
            throw new InvalidArgumentException("City must be a valid string.");
        }

        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->city;
    }
}
