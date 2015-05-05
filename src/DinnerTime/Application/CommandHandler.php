<?php

namespace DinnerTime\Application;

/**
 * Interface CommandHandler
 * @package DinnerTime\Application
 */
interface CommandHandler
{
    /**
     * @param Command $command
     *
     * @return mixed
     */
    public function handle(Command $command);
}
