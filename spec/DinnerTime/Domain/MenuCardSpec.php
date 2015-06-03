<?php

namespace spec\DinnerTime\Domain;

use DinnerTime\Domain\MenuCard\MenuCardId;
use DinnerTime\Domain\Restaurant;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MenuCardSpec extends ObjectBehavior
{
    function let(Restaurant $restaurant)
    {
        $this->beConstructedWith(new MenuCardId(), $restaurant, "Test");
    }

    function it_should_correct_update_a_title()
    {
        $this->getTitle()->shouldReturn("Test");
        $this->updateTitle("Test2");
        $this->getTitle()->shouldReturn("Test2");
    }
}
