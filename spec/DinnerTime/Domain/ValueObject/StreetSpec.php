<?php

namespace spec\DinnerTime\Domain\ValueObject;

use DinnerTime\Domain\Exception\InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StreetSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith("Igielna", "3");
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('DinnerTime\Domain\ValueObject\Street');
    }

    function it_has_a_street_name()
    {
        $this->getStreetName()->shouldReturn("Igielna");
    }

    function it_has_a_street_number()
    {
        $this->getStreetNumber()->shouldReturn("3");
    }

    function it_throw_exception_when_streen_name_is_not_a_string()
    {
        $this->shouldThrow(new InvalidArgumentException("Street name must be a valid string."))->during("__construct", [123, "3"]);
    }

    function it_throw_exception_when_street_number_is_not_a_string()
    {
        $this->shouldThrow(new InvalidArgumentException("Street number must be a valid string."))->during("__construct", ["Igilena", 123]);
    }
}
