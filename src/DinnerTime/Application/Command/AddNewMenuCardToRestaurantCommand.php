<?php

namespace DinnerTime\Application\Command;

use DinnerTime\Application\Command;
use DinnerTime\Domain\Restaurant;

/**
 * Class AddNewMenuCardToRestaurantCommand
 *
 * @package DinnerTime\Application\Command
 */
final class AddNewMenuCardToRestaurantCommand implements Command
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var Restaurant
     */
    public $restaurant;

    /**
     * @param Restaurant $restaurant
     */
    public function __construct(Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;
    }

    /**
     * @return $this
     */
    public function getData()
    {
        return $this;
    }
}
