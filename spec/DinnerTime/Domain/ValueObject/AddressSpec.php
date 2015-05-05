<?php

namespace spec\DinnerTime\Domain\ValueObject;

use DinnerTime\Domain\ValueObject\City;
use DinnerTime\Domain\ValueObject\Country;
use DinnerTime\Domain\ValueObject\Street;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddressSpec extends ObjectBehavior
{
    function let()
    {
        $street = new Street("igielna", "3");
        $this->beConstructedWith($street, new City("Jasło"), new Country("Polska"));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('DinnerTime\Domain\ValueObject\Address');
    }

    function it_has_a_city()
    {
        $this->getCity()->shouldReturn("Jasło");
    }

    function it_has_a_country()
    {
        $this->getCountry()->shouldReturn("Polska");
    }
}
