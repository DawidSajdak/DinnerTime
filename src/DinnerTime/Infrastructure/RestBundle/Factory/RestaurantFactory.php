<?php

namespace DinnerTime\Infrastructure\RestBundle\Factory;

use DinnerTime\Application\Command;
use DinnerTime\Application\Factory\RestaurantFactory as BaseRestaurantFactory;
use DinnerTime\Application\Command\CreateRestaurantCommand;
use DinnerTime\Domain\Address;
use DinnerTime\Domain\Street;
use DinnerTime\Infrastructure\DoctrineBridgeBundle\Entity\Restaurant;

/**
 * Class RestaurantFactory
 *
 * @package DinnerTime\Infrastructure\RestBundle\Factory
 */
class RestaurantFactory implements BaseRestaurantFactory
{
    /**
     * @param Command $data
     *
     * @return Restaurant
     */
    public function createRestaurant(Command $data)
    {
        /** @var CreateRestaurantCommand $data */
        $address = new Address(new Street($data->streetName, $data->streetNumber), $data->city, $data->country);
        return new Restaurant($data->restaurantName, $address);
    }
}
