<?php

namespace DinnerTime\Application\Command;

use DinnerTime\Application\Command;

/**
 * Class CreateRestaurantCommand
 *
 * @package DinnerTime\Application\Command
 */
final class CreateRestaurantCommand implements Command
{
    /**
     * @var string
     */
    public $restaurantName;

    /**
     * @var string
     */
    public $streetName;

    /**
     * @var string
     */
    public $streetNumber;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $country;

    /**
     * @return $this
     */
    public function getData()
    {
        return $this;
    }
}
