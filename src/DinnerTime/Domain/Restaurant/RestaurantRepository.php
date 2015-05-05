<?php

namespace DinnerTime\Domain\Restaurant;

use DinnerTime\Domain\Restaurant;

/**
 * Interface RestaurantRepository
 *
 * @package DinnerTime\Domain\Restaurant
 */
interface RestaurantRepository
{
    /**
     * @param Restaurant $restaurant
     *
     * @return boolean
     */
    public function add(Restaurant $restaurant);

    /**
     * @param string $restaurantName
     *
     * @return boolean
     */
    public function hasRestaurant($restaurantName);

    /**
     * @return Restaurant[]
     */
    public function getRestaurantsList();
}
