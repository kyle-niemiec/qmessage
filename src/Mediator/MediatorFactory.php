<?php

namespace CBW\QMessage\Mediator;

use stdClass;

/**
 * Class MediatorFactory
 * @package CWB\QMessage\Mediator
 */
final class MediatorFactory
{
    /**
     * Construct the factory with settings from the configuration files.
     *
     * @param array $eventsMediators
     */
    #[NoReturn]
    public function __construct(public readonly array $eventsMediators) { }
}