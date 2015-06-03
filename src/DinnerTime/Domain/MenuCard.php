<?php

namespace DinnerTime\Domain;

use DinnerTime\Domain\MenuCard\MenuCardId;

/**
 * Class MenuCard
 *
 * @package DinnerTime\Domain
 */
class MenuCard
{
    /**
     * @var MenuCardId
     */
    protected $id;

    /**
     * @var Restaurant
     */
    protected $restaurant;

    /**
     * @var string
     */
    protected $title;

    /**
     * @param MenuCardId $menuCardId
     * @param Restaurant $restaurant
     * @param            $title
     */
    public function __construct(MenuCardId $menuCardId, Restaurant $restaurant, $title)
    {
        $this->id = $menuCardId;
        $this->restaurant = $restaurant;
        $this->title = $title;
    }

    /**
     * @return MenuCardId
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function updateTitle($title)
    {
        $this->title = $title;
    }
}
