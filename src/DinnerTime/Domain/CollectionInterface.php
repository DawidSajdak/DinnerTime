<?php

namespace DinnerTime\Domain;

/**
 * Interface CollectionInterface
 *
 * @package DinnerTime\Domain
 */
interface CollectionInterface
{
    /**
     * @param $element
     *
     * @return boolean
     */
    public function add($element);

    /**
     * @param $key
     * @param $element
     *
     * @return boolean
     */
    public function set($key, $element);

    /**
     * @return boolean
     */
    public function isEmpty();

    /**
     * @return mixed
     */
    public function toArray();

    /**
     * @return integer
     */
    public function count();
}