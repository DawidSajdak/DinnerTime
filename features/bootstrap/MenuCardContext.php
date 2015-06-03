<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use DinnerTime\Domain\ArrayCollection;
use DinnerTime\Domain\MenuCard;
use DinnerTime\Domain\Restaurant;
use DinnerTime\Domain\Restaurant\RestaurantId;
use DinnerTime\Domain\ValueObject\Address;
use DinnerTime\Domain\ValueObject\City;
use DinnerTime\Domain\ValueObject\Country;
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

    /**
     * @var ArrayCollection
     */
    private $listOfMenuCards;

    /**
     * @Given /^I have restaurant with following data:$/
     */
    public function iHaveRestaurantWithFollowingData(TableNode $table)
    {
        $restaurantData = $table->getRow(1);

        $street = new Street($restaurantData[1], $restaurantData[2]);
        $address = new Address($street, new City($restaurantData[3]), new Country($restaurantData[4]));
        $this->restaurant = new Restaurant(new RestaurantId(), $restaurantData[0], $address);
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
        if (!$this->restaurant->hasMenuCard(new MenuCard(new MenuCard\MenuCardId(), $this->restaurant, $arg1))) {
            throw new \Exception("Menu card does not exists");
        }
    }

    /**
     * @Given There are :arg1 menu cards
     */
    public function thereAreMenuCards($arg1)
    {
        $street = new Street("igielna", "3");
        $address = new Address($street, new City("Jasło"), new Country("Polska"));
        $this->restaurant = new Restaurant(new RestaurantId(), "Test", $address);

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
        if ($this->listOfMenuCards->count() !== intval($arg1)) {
            throw new \Exception(count($this->listOfMenuCards).' menu cards found.');
        }
    }

    /**
     * @Then I should get an empty list of menu cards
     */
    public function iShouldGetAnEmptyListOfMenuCards()
    {
        if ($this->listOfMenuCards->count() !== 0) {
            throw new \Exception(count($this->listOfMenuCards).' menu cards found.');
        }
    }
}
