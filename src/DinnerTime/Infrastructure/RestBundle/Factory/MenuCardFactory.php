<?php

namespace DinnerTime\Infrastructure\RestBundle\Factory;

use DinnerTime\Application\Command;
use DinnerTime\Application\Command\AddNewMenuCardToRestaurantCommand;
use DinnerTime\Application\Factory\MenuCardFactory as BaseMenuCardFactory;
use DinnerTime\Infrastructure\DoctrineBridgeBundle\Entity\MenuCard;

/**
 * Class MenuCardFactory
 *
 * @package DinnerTime\Infrastructure\RestBundle\Factory
 */
class MenuCardFactory implements BaseMenuCardFactory
{
    /**
     * @param Command $data
     *
     * @return MenuCard
     */
    public function createMenuCard(Command $data)
    {
        /** @var AddNewMenuCardToRestaurantCommand $data */
        return new MenuCard($data->restaurant, $data->title);
    }
}
