<?php

namespace DinnerTime\Application\Restaurant;

use DinnerTime\Domain\MenuCard;
use DinnerTime\Domain\Restaurant;
use DinnerTime\Domain\Restaurant\RestaurantId;
use DinnerTime\Domain\Restaurant\RestaurantRepository;

/**
 * Class InMemoryRestaurantRepository
 *
 * @package DinnerTime\Application\Restaurant
 */
class InMemoryRestaurantRepository implements RestaurantRepository
{
    private $restaurants = [];

    /**
     * @param Restaurant $restaurant
     *
     * @return boolean
     */
    public function add(Restaurant $restaurant)
    {
        if (!$this->hasRestaurant($restaurant->getRestaurantName())) {
            $this->restaurants[$restaurant->getRestaurantName()] = $restaurant;
        }
    }

    /**
     * @param string $restaurantName
     *
     * @return boolean
     */
    public function hasRestaurant($restaurantName)
    {
        return isset($this->restaurants[$restaurantName]);
    }

    /**
     * @return array
     */
    public function getRestaurantsList()
    {
        return $this->restaurants;
    }

    /**
     * @return RestaurantId
     */
    public function nextIdentity()
    {
        return new RestaurantId();
    }
}
