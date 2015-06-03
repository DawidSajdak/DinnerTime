<?php

namespace DinnerTime\Application\Factory;

use DinnerTime\Application\Command;
use DinnerTime\Domain\Restaurant;
use DinnerTime\Domain\Restaurant\RestaurantId;

/**
 * Interface RestaurantFactory
 *
 * @package DinnerTime\Application\Factory
 */
interface RestaurantFactory
{
    /**
     * @param RestaurantId $restaurantId
     * @param Command                 $command
     *
     * @return Restaurant
     */
    public function createRestaurant(RestaurantId $restaurantId, Command $command);
}
