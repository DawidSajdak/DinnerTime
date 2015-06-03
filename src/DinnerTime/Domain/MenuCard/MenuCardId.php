<?php

namespace DinnerTime\Domain\MenuCard;

use Rhumsaa\Uuid\Uuid;

/**
 * Class MenuCardId
 *
 * @package DinnerTime\Domain\MenuCard
 */
final class MenuCardId
{
    /**
     * @var string
     */
    private $id;

    /**
     * @param string $id
     */
    public function __construct($id = null)
    {
        $this->id = null === $id ? Uuid::uuid4()->toString() : $id;
    }

    /**
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @param MenuCardId $menuCardId
     * @return boolean
     */
    public function equals(MenuCardId $menuCardId)
    {
        return $this->id() === $menuCardId->id();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->id();
    }
}
