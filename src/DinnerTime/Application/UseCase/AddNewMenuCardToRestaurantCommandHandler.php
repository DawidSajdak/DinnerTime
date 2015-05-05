<?php

namespace DinnerTime\Application\UseCase;

use DinnerTime\Application\Command;
use DinnerTime\Application\CommandHandler;
use DinnerTime\Application\Factory\MenuCardFactory;
use DinnerTime\Domain\Restaurant;
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
     * @param Command $command
     *
     * @return mixed
     */
    public function handle(Command $command)
    {
        /** @var Restaurant $restaurant */
        $restaurant = $command->restaurant;
        $restaurant->createMenuCardForRestaurant($command->title);
        $this->repository->add($restaurant);
    }
}
