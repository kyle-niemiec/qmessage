<?php

namespace CBW\QMessage\Converter;

/**
 * Class ConverterFactory
 * @package CBW\QMessage\Converter
 */
final class ConverterFactory
{
    /**
     * Construct the converter with 
     * 
     * @param
     */
    #[NoReturn]
    public function __construct(protected array $eventsConverters = []) { }
}