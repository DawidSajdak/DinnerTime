<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use DinnerTime\Domain\MenuCard;
use DinnerTime\Domain\Restaurant;
use DinnerTime\Domain\ValueObject\Address;
use DinnerTime\Domain\ValueObject\Street;

/**
 * Class MenuCardContext
 */
class MenuCardContext implements SnippetAcceptingContext
{
    /**
     * @var Restaurant
     */
    private $restaurant;
    private $listOfMenuCards;

    /**
     * @Given I have restaurant with name :restaurantName
     */
    public function iHaveRestaurantWithName($restaurantName)
    {
        $street = new Street("igielna", "3");
        $address = new Address($street, "Jasło", "Polska");
        $this->restaurant = new Restaurant($restaurantName, $address);
    }

    /**
     * @When I create the :menuCardTitle menu card
     */
    public function iCreateTheMenuCard($menuCardTitle)
    {
        $this->restaurant->createMenuCardForRestaurant($menuCardTitle);
    }

    /**
     * @Then the :arg1 menu card should be saved
     */
    public function theManuCardShouldBeSaved($arg1)
    {
        if (!$this->restaurant->hasMenuCard(new MenuCard($this->restaurant, $arg1))) {
            throw new \Exception("Menu card does not exists");
        }
    }

    /**
     * @Given There are :arg1 menu cards
     */
    public function thereAreMenuCards($arg1)
    {
        $street = new Street("igielna", "3");
        $address = new Address($street, "Jasło", "Polska");
        $this->restaurant = new Restaurant("Test", $address);

        for ($i = 0; $i < $arg1; $i++) {
            $this->restaurant->createMenuCardForRestaurant("Test " . $i);
        }
    }

    /**
     * @When I list menu cards
     */
    public function iListMenuCards()
    {
        $this->listOfMenuCards = $this->restaurant->getMenuCardList();
    }

    /**
     * @Then I should get a list of :arg1 menu cards
     */
    public function iShouldGetAListOfMenuCards($arg1)
    {
        if (count($this->listOfMenuCards) !== intval($arg1)) {
            throw new \Exception(count($this->listOfMenuCards).' menu cards found.');
        }
    }

    /**
     * @Then I should get an empty list of menu cards
     */
    public function iShouldGetAnEmptyListOfMenuCards()
    {
        if (count($this->listOfMenuCards) !== 0) {
            throw new \Exception(count($this->listOfMenuCards).' menu cards found.');
        }
    }
}
