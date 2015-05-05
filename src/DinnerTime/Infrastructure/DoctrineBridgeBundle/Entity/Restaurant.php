<?php

namespace DinnerTime\Infrastructure\DoctrineBridgeBundle\Entity;

use DinnerTime\Domain\Restaurant as BaseRestaurant;
use Doctrine\ORM\Mapping as ORM;
use DinnerTime\Infrastructure\DoctrineBridgeBundle\Entity\MenuCard as DoctrineMenuCard;

/**
 * Class Restaurant
 * @package DinnerTime\DoctrineBridgeBundle\Entity
 */
class Restaurant extends BaseRestaurant
{
    protected $id;

    /**
     * @param $title
     */
    public function createMenuCardForRestaurant($title)
    {
        $menuCard = new DoctrineMenuCard($this, $title);

        if (!$this->hasMenuCard($menuCard)) {
            $this->menuCards[$menuCard->getTitle()] = $menuCard;
        }
    }
}
