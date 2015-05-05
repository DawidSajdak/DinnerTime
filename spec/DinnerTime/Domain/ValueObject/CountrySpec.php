<?php

namespace spec\DinnerTime\Domain\ValueObject;

use DinnerTime\Domain\Exception\InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CountrySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith("Polska");
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('DinnerTime\Domain\ValueObject\Country');
    }

    function it_throw_exception_when_country_is_not_a_string()
    {
        $this->shouldThrow(new InvalidArgumentException("Country must be a valid string."))->during("__construct", [123]);
    }
}
