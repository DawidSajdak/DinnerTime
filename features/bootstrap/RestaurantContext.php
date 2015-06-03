<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use DinnerTime\Application\Restaurant\InMemoryRestaurantRepository;
use DinnerTime\Domain\Restaurant;
use DinnerTime\Domain\Restaurant\RestaurantId;
use DinnerTime\Domain\ValueObject\Address;
use DinnerTime\Domain\ValueObject\City;
use DinnerTime\Domain\ValueObject\Country;
use DinnerTime\Domain\ValueObject\Street;

/**
 * Class RestaurantContext
 */
class RestaurantContext implements SnippetAcceptingContext
{
    private $listOfRestaurants;

    public function __construct()
    {
        $this->restaurantRepository = new InMemoryRestaurantRepository();
    }

    /**
     * @Given I am a guest
     */
    public function iAmAGuest()
    {
    }

    /**
     * @When /^I create restaurant with following data:$/
     */
    public function iCreateRestaurantWithFollowingData(TableNode $table)
    {
        $restaurantData = $table->getRow(1);

        try {
            $street = new Street($restaurantData[1], $restaurantData[2]);
            $address = new Address($street, new City($restaurantData[3]), new Country($restaurantData[4]));
            $restaurant = new Restaurant(new RestaurantId(), $restaurantData[0], $address);
            $this->restaurantRepository->add($restaurant);
        } catch (\Exception $e) {
        }
    }

    /**
     * @Then the :restaurantName restaurant should be saved
     */
    public function theRestaurantShouldBeSaved($restaurantName)
    {
        if (!$this->restaurantRepository->hasRestaurant($restaurantName)) {
            throw new \Exception("Restaurant does not exists.");
        }
    }

    /**
     * @Then the :arg1 restaurant should not be saved
     */
    public function theRestaurantShouldNotBeSaved($restaurantName)
    {
        if ($this->restaurantRepository->hasRestaurant($restaurantName)) {
            throw new \Exception("Restaurant exists.");
        }
    }


    /**
     * @Given There are :arg1 restaurants
     */
    public function thereAreRestaurants($numberOfRestaurants = 0)
    {
        for ($i = 0; $i < $numberOfRestaurants; $i++) {
            $street = new Street("igielna", "3");
            $address = new Address($street, new City("Jasło"), new Country("Polska"));
            $restaurant = new Restaurant(new RestaurantId(), "Test " . $i, $address);
            $this->restaurantRepository->add($restaurant);
        }
    }

    /**
     * @When I list restaurants
     */
    public function iListRestaurants()
    {
        $this->listOfRestaurants = $this->restaurantRepository->getRestaurantsList();
    }

    /**
     * @Then I should get a list of :arg1 restaurants
     */
    public function iShouldGetAListOfRestaurants($numberOfRestaurants)
    {
        if (count($this->listOfRestaurants) !== intval($numberOfRestaurants)) {
            throw new \Exception(count($this->listOfRestaurants).' restaurants found.');
        }
    }

    /**
     * @Then I should get an empty list of restaurants
     */
    public function iShouldGetAnEmptyListOfRestaurants()
    {
        if (count($this->listOfRestaurants) !== 0) {
            throw new \Exception(count($this->listOfRestaurants).' restaurants found.');
        }
    }
}
