<?php

namespace DinnerTime\Infrastructure\DoctrineBridgeBundle\Entity;

use DinnerTime\Domain\Restaurant as BaseRestaurant;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Restaurant
 * @package DinnerTime\DoctrineBridgeBundle\Entity
 */
class Restaurant extends BaseRestaurant
{
    protected $id;
}
