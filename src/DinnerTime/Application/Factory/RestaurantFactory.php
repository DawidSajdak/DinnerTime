<?php

namespace DinnerTime\Application\Factory;

use DinnerTime\Application\Command;
use DinnerTime\Domain\Restaurant;

/**
 * Interface RestaurantFactory
 *
 * @package DinnerTime\Application\Factory
 */
interface RestaurantFactory
{
    /**
     * @param Command $command
     *
     * @return Restaurant
     */
    public function createRestaurant(Command $command);
}
