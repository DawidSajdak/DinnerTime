<?php

namespace DinnerTime\Domain\ValueObject;

use DinnerTime\Domain\Exception\InvalidArgumentException;

/**
 * Class Country
 *
 * @package DinnerTime\Domain\ValueObject
 */
class Country
{
    /**
     * @var string
     */
    private $country;

    /**
     * @param string $country
     *
     * @throws InvalidArgumentException
     */
    public function __construct($country)
    {
        if (!is_string($country)) {
            throw new InvalidArgumentException("Country must be a valid string.");
        }

        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->country;
    }
}
