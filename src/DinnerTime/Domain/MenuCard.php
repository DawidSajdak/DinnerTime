<?php

namespace DinnerTime\Domain;

/**
 * Class MenuCard
 *
 * @package DinnerTime\Domain
 */
class MenuCard
{
    /**
     * @var Restaurant
     */
    protected $restaurant;

    /**
     * @var string
     */
    protected $title;

    /**
     * @param Restaurant $restaurant
     * @param            $title
     */
    public function __construct(Restaurant $restaurant, $title)
    {
        $this->restaurant = $restaurant;
        $this->title = $title;
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
