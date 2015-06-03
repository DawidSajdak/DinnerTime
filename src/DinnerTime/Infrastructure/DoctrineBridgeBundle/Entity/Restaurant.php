<?php

namespace DinnerTime\Infrastructure\DoctrineBridgeBundle\Entity;

use DinnerTime\Domain\Exception\InvalidArgumentException;
use DinnerTime\Domain\MenuCard\MenuCardId;
use DinnerTime\Domain\Restaurant as BaseRestaurant;
use DinnerTime\Domain\Restaurant\RestaurantId;
use DinnerTime\Domain\ValueObject\Address;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DinnerTime\Infrastructure\DoctrineBridgeBundle\Entity\MenuCard as DoctrineMenuCard;

/**
 * Class Restaurant
 * @package DinnerTime\DoctrineBridgeBundle\Entity
 */
class Restaurant extends BaseRestaurant
{
    /**
     * @param RestaurantId $id
     * @param string       $restaurantName
     * @param Address      $restaurantAddress
     *
     * @throws InvalidArgumentException
     */
    public function __construct(RestaurantId $id, $restaurantName, Address $restaurantAddress)
    {
        parent::__construct($id, $restaurantName, $restaurantAddress);
        $this->menuCards = new ArrayCollection();
    }

    /**
     * @param $title
     */
    public function createMenuCardForRestaurant($title)
    {
        $menuCard = new DoctrineMenuCard(new MenuCardId(), $this, $title);

        if (!$this->hasMenuCard($menuCard)) {
            $this->menuCards[$menuCard->getTitle()] = $menuCard;
        }
    }
}
