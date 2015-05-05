<?php

namespace DinnerTime\Application\Factory;

use DinnerTime\Application\Command;
use DinnerTime\Domain\MenuCard;

/**
 * Interface MenuCardFactory
 *
 * @package DinnerTime\Application\Factory
 */
interface MenuCardFactory
{
    /**
     * @param Command $command
     *
     * @return MenuCard
     */
    public function createMenuCard(Command $command);
}
