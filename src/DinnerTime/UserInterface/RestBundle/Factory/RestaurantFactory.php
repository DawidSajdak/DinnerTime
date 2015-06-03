<?php

namespace DinnerTime\UserInterface\RestBundle\Factory;

use DinnerTime\Application\Command;
use DinnerTime\Application\Factory\RestaurantFactory as BaseRestaurantFactory;
use DinnerTime\Application\Command\CreateRestaurantCommand;
use DinnerTime\Domain\Restaurant\RestaurantId;
use DinnerTime\Domain\ValueObject\Address;
use DinnerTime\Domain\ValueObject\City;
use DinnerTime\Domain\ValueObject\Country;
use DinnerTime\Domain\ValueObject\Street;
use DinnerTime\Infrastructure\DoctrineBridgeBundle\Entity\Restaurant;

/**
 * Class RestaurantFactory
 *
 * @package DinnerTime\UserInterface\RestBundle\Factory
 */
class RestaurantFactory implements BaseRestaurantFactory
{
    /**
     * @param RestaurantId $restaurantId
     * @param Command      $data
     *
     * @return Restaurant
     */
    public function createRestaurant(RestaurantId $restaurantId, Command $data)
    {
        /** @var CreateRestaurantCommand $data */
        $address = new Address(new Street($data->streetName, $data->streetNumber), new City($data->city), new Country($data->country));
        return new Restaurant($restaurantId, $data->restaurantName, $address);
    }
}
