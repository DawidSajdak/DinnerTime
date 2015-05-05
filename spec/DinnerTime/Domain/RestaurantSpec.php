<?php

namespace spec\DinnerTime\Domain;

use DinnerTime\Domain\Address;
use DinnerTime\Domain\Exception\InvalidArgumentException;
use DinnerTime\Domain\MenuCard;
use DinnerTime\Domain\Street;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RestaurantSpec extends ObjectBehavior
{
    function let()
    {
        $street = new Street("igielna", "3");
        $address = new Address($street, "Jasło", "Polska");
        $this->beConstructedWith("Mała Chatka", $address);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('DinnerTime\Domain\Restaurant');
    }

    function it_has_a_restaurant_name()
    {
        $this->getRestaurantName()->shouldReturn("Mała Chatka");
    }

    function it_has_an_address()
    {
        $this->getRestaurantAddress()->getStreet()->getStreetName()->shouldReturn("igielna");
        $this->getRestaurantAddress()->getStreet()->getStreetNumber()->shouldReturn("3");
        $this->getRestaurantAddress()->getCity()->shouldReturn("Jasło");
        $this->getRestaurantAddress()->getCountry()->shouldReturn("Polska");
    }

    function it_throw_exception_when_restaurant_name_is_not_a_string()
    {
        $street = new Street("igielna", "3");
        $address = new Address($street, "Jasło", "Polska");

        $this->shouldThrow(new InvalidArgumentException("Restaurant name must be a valid string."))->during("__construct", [123, $address]);
    }

    function it_throw_exception_when_restaurant_name_has_less_than_three_letters()
    {
        $street = new Street("igielna", "3");
        $address = new Address($street, "Jasło", "Polska");

        $this->shouldThrow(new InvalidArgumentException("Restaurant name must have at least 3 letters."))->during("__construct", ["a", $address]);
    }

    public function it_should_successfully_add_new_menu_card(MenuCard $menuCard)
    {
        $menuCard->getTitle()->willReturn("Test");

        $this->getMenuCardList()->isEmpty()->shouldBe(true);
        $this->addMenuCardToRestaurant($menuCard);
        $this->getMenuCardList()->isEmpty()->shouldBe(false);
        $this->getMenuCardList()->count()->shouldBe(1);

        $this->hasMenuCard($menuCard)->shouldBe(true);
    }
}
