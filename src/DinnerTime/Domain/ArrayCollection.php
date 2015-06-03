<?php

namespace DinnerTime\Domain;

/**
 * Class ArrayCollection
 *
 * @package DinnerTime\Domain
 */
class ArrayCollection implements CollectionInterface
{
    /**
     * @var array
     */
    private $elements = [];

    /**
     * {@inheritDoc}
     */
    public function add($value)
    {
        $this->elements[] = $value;
    }

    /**
     * @param $key
     * @param $value
     *
     * @return boolean
     */
    public function set($key, $value)
    {
        $this->elements[$key] = $value;
    }

    /**
     * {@inheritDoc}
     */
    public function isEmpty()
    {
        return empty($this->elements);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        return $this->elements;
    }

    /**
     * {@inheritDoc}
     */
    public function count()
    {
        return count($this->elements);
    }
}
