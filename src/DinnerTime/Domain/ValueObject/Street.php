<?php

namespace DinnerTime\Domain\ValueObject;

use DinnerTime\Domain\Exception\InvalidArgumentException;

/**
 * Class Street
 * @package DinnerTime\CoreDomain\ValueObject\Geography
 */
final class Street
{
    /**
     * @var string
     */
    private $streetName;
    /**
     * @var string
     */
    private $streetNumber;

    /**
     * @param string $streetName
     * @param string $streetNumber
     * @throws InvalidArgumentException
     */
    public function __construct($streetName, $streetNumber)
    {
        if (!is_string($streetName)) {
            throw new InvalidArgumentException("Street name must be a valid string.");
        }

        if (!is_string($streetNumber)) {
            throw new InvalidArgumentException("Street number must be a valid string.");
        }

        $this->streetName = $streetName;
        $this->streetNumber = $streetNumber;
    }

    /**
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf("%s %s", $this->getStreetName(), $this->getStreetNumber());
    }
}
