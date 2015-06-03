<?php

namespace DinnerTime\Domain\Restaurant;

use Rhumsaa\Uuid\Uuid;

/**
 * Class RestaurantId
 *
 * @package DinnerTime\Domain\Restaurant
 */
final class RestaurantId
{
    /**
     * @var string
     */
    private $id;

    /**
     * @param string $id
     */
    public function __construct($id = null)
    {
        $this->id = null === $id ? Uuid::uuid4()->toString() : $id;
    }

    /**
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @param RestaurantId $restaurantId
     * @return boolean
     */
    public function equals(RestaurantId $restaurantId)
    {
        return $this->id() === $restaurantId->id();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->id();
    }
}
