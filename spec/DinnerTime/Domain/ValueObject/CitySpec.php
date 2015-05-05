<?php

namespace spec\DinnerTime\Domain\ValueObject;

use DinnerTime\Domain\Exception\InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CitySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith("Kraków");
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('DinnerTime\Domain\ValueObject\City');
    }

    function it_throw_exception_when_city_is_not_a_string()
    {
        $this->shouldThrow(new InvalidArgumentException("City must be a valid string."))->during("__construct", [123]);
    }
}
