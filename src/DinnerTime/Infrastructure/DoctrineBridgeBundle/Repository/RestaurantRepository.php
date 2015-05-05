<?php

namespace DinnerTime\Infrastructure\DoctrineBridgeBundle\Repository;

use DinnerTime\Domain\Restaurant;
use DinnerTime\Domain\Restaurant\RestaurantRepository as BaseRestaurantRepository;
use Doctrine\ORM\EntityRepository;

/**
 * Class RestaurantRepository
 *
 * @package DinnerTime\Infrastructure\DoctrineBridgeBundle\Repository
 */
class RestaurantRepository extends EntityRepository implements BaseRestaurantRepository
{
    /**
     * @param Restaurant $restaurant
     *
     * @return bool|void
     */
    public function add(Restaurant $restaurant)
    {
        $this->_em->persist($restaurant);
        $this->_em->flush();
    }

    /**
     * @param string $restaurantName
     *
     * @return boolean
     */
    public function hasRestaurant($restaurantName)
    {
        $queryBuilder = $this->_em->createQueryBuilder()
            ->select('t')
            ->from("DinnerTimeDoctrineBridgeBundle:Restaurant", 't')
            ->where('t.restaurantName = :restaurantName');
        $queryBuilder->setParameter('restaurantName', $restaurantName);

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

    public function getRestaurantsList()
    {
        // TODO: Implement getRestaurantsList() method.
    }
}
