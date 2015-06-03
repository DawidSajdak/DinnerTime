<?php

namespace DinnerTime\Application\UseCase;

use DinnerTime\Application\Command;
use DinnerTime\Application\CommandHandler;
use DinnerTime\Application\Factory\RestaurantFactory;
use DinnerTime\Domain\Restaurant\RestaurantAlreadyExistsException;
use DinnerTime\Domain\Restaurant\RestaurantRepository;

/**
 * Class CreateRestaurantCommandHandler
 *
 * @package DinnerTime\Application\UseCase
 */
final class CreateRestaurantCommandHandler implements CommandHandler
{
    /**
     * @var RestaurantRepository
     */
    private $repository;

    /**
     * @var RestaurantFactory
     */
    private $restaurantFactory;

    /**
     * @param RestaurantRepository $repository
     * @param RestaurantFactory    $restaurantFactory
     */
    public function __construct(RestaurantRepository $repository, RestaurantFactory $restaurantFactory)
    {
        $this->repository = $repository;
        $this->restaurantFactory = $restaurantFactory;
    }

    /**
     * @param Command $command
     *
     * @return mixed|void
     * @throws RestaurantAlreadyExistsException
     */
    public function handle(Command $command)
    {
        if ($this->repository->hasRestaurant($command->restaurantName)) {
            throw new RestaurantAlreadyExistsException("Restaurant already exists.");
        }

        $restaurant = $this->restaurantFactory->createRestaurant(
            $this->repository->nextIdentity(),
            $command
        );

        $this->repository->add($restaurant);
    }
}
