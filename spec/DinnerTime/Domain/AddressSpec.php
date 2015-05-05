<?php

namespace spec\DinnerTime\Domain;

use DinnerTime\Domain\Exception\InvalidArgumentException;
use DinnerTime\Domain\Street;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddressSpec extends ObjectBehavior
{
    function let()
    {
        $street = new Street("igielna", "3");
        $this->beConstructedWith($street, "Jasło", "Polska");
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('DinnerTime\Domain\Address');
    }

    function it_has_a_city()
    {
        $this->getCity()->shouldReturn("Jasło");
    }

    function it_has_a_country()
    {
        $this->getCountry()->shouldReturn("Polska");
    }

    function it_throw_exception_when_city_is_not_a_string()
    {
        $street = new Street("igielna", "3");

        $this->shouldThrow(new InvalidArgumentException("City must be a valid string."))->during("__construct", [$street, 123, "Polska"]);
    }

    function it_throw_exception_when_country_is_not_a_string()
    {
        $street = new Street("igielna", "3");

        $this->shouldThrow(new InvalidArgumentException("Country must be a valid string."))->during("__construct", [$street, "Jasło", 123]);
    }
}
