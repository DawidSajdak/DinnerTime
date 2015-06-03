<?php

namespace DinnerTime\Domain;

use DinnerTime\Domain\Exception\InvalidArgumentException;
use DinnerTime\Domain\MenuCard\MenuCardId;
use DinnerTime\Domain\Restaurant\RestaurantId;
use DinnerTime\Domain\ValueObject\Address;
use DinnerTime\Domain\ValueObject\City;
use DinnerTime\Domain\ValueObject\Country;
use DinnerTime\Domain\ValueObject\Street;

/**
 * Class Restaurant
 *
 * @package DinnerTime\Domain
 */
class Restaurant
{
    /**
     * @var
     */
    protected $id;

    /**
     * @var String
     */
    protected $restaurantName;

    /**
     * @var String
     */
    protected $streetName;

    /**
     * @var String
     */
    protected $streetNumber;

    /**
     * @var String
     */
    protected $city;

    /**
     * @var String
     */
    protected $country;

    /**
     * @var MenuCard[]
     */
    protected $menuCards;

    /**
     * @param RestaurantId $id
     * @param string       $restaurantName
     * @param Address      $restaurantAddress
     *
     * @throws InvalidArgumentException
     */
    public function __construct(RestaurantId $id, $restaurantName, Address $restaurantAddress)
    {
        if (!is_string($restaurantName)) {
            throw new InvalidArgumentException("Restaurant name must be a valid string.");
        }

        if (strlen($restaurantName) < 3) {
            throw new InvalidArgumentException("Restaurant name must have at least 3 letters.");
        }

        $this->id = $id;
        $this->menuCards = new ArrayCollection();
        $this->restaurantName = $restaurantName;
        $this->setRestaurantAddress($restaurantAddress);
    }

    /**
     * @return String
     */
    public function getRestaurantName()
    {
        return $this->restaurantName;
    }

    /**
     * @return Address
     */
    public function getRestaurantAddress()
    {
        $street = new Street($this->streetName, $this->streetNumber);

        return new Address($street, new City($this->city), new Country($this->country));
    }

    /**
     * @param $title
     */
    public function createMenuCardForRestaurant($title)
    {
        $menuCard = new MenuCard(new MenuCardId(), $this, $title);

        if (!$this->hasMenuCard($menuCard)) {
            $this->menuCards->set($menuCard->getTitle(), $menuCard);
        }
    }

    /**
     * @param MenuCard $menuCard
     *
     * @return bool
     */
    public function hasMenuCard(MenuCard $menuCard)
    {
        /** @var MenuCard $menuCardItem */
        foreach ($this->menuCards->toArray() as $menuCardItem) {
            if ($menuCardItem->getTitle() === $menuCard->getTitle()) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return MenuCard[]
     */
    public function getMenuCardList()
    {
        return $this->menuCards;
    }

    /**
     * @param Address $restaurantAddress
     */
    private function setRestaurantAddress(Address $restaurantAddress)
    {
        $this->streetName = $restaurantAddress->getStreet()->getStreetName();
        $this->streetNumber = $restaurantAddress->getStreet()->getStreetNumber();
        $this->city = $restaurantAddress->getCity();
        $this->country = $restaurantAddress->getCountry();
    }
}
