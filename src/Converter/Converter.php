<?php

namespace CBW\QMessage\Converter;

use Psr\Log\LoggerInterface;

/**
 * Class Converter
 * @package CBW\QMessage\Converter
 */
class Converter
{
    /**
     * Construct the converter with the logger
     *
     * @param LoggerInterface $logger The application logger
     */
    #[NoReturn]
    public function __construct(
        protected readonly LoggerInterface $logger
    ) { }
}