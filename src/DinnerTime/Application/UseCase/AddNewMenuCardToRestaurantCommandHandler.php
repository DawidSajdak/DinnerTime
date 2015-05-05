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
     * @var MenuCardFactory
     */
    private $menuCardFactory;

    /**
     * @param RestaurantRepository $repository
     * @param MenuCardFactory      $menuCardFactory
     */
    public function __construct(RestaurantRepository $repository, MenuCardFactory $menuCardFactory)
    {
        $this->repository = $repository;
        $this->menuCardFactory = $menuCardFactory;
    }

    /**
     * @param Command $command
     *
     * @return mixed
     */
    public function handle(Command $command)
    {
        $menuCard = $this->menuCardFactory->createMenuCard($command);

        /** @var Restaurant $restaurant */
        $restaurant = $command->restaurant;
        $restaurant->addMenuCardToRestaurant($menuCard);
        $this->repository->add($restaurant);
    }
}
