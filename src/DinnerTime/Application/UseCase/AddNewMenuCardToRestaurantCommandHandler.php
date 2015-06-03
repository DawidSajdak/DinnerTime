<?php

namespace DinnerTime\Application\UseCase;

use DinnerTime\Application\Command;
use DinnerTime\Application\CommandHandler;
use DinnerTime\Domain\Restaurant;
use DinnerTime\Domain\Restaurant\RestaurantDoesNotExistException;
use DinnerTime\Domain\Restaurant\RestaurantRepository;

/**
 * Class AddNewMenuCardToRestaurantCommandHandler
 *
 * @package DinnerTime\Application\UseCase
 */
final class AddNewMenuCardToRestaurantCommandHandler implements CommandHandler
{
    /**
     * @var RestaurantRepository
     */
    private $repository;

    /**
     * @param RestaurantRepository $repository
     */
    public function __construct(RestaurantRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Command|Command\AddNewMenuCardToRestaurantCommand $command
     *
     * @return mixed
     * @throws RestaurantDoesNotExistException
     */
    public function handle(Command $command)
    {
        /** @var Restaurant $restaurant */
        $restaurant = $command->restaurant;

        if (!$this->repository->hasRestaurant($restaurant->getRestaurantName())) {
            throw new RestaurantDoesNotExistException("restaurant does not exist.");
        }

        $restaurant->createMenuCardForRestaurant($command->title);
        $this->repository->add($restaurant);
    }
}
