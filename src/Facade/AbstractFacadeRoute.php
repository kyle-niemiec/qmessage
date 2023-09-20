<?php

namespace CBW\QMessage\Facade;

use CBW\QMessage\DataObject\AbstractDataObject;
use CBW\QMessage\Enumeration\HttpRequestMethod;

/**
 * Class AbstractFacadeRoute
 * @package CBW\QMessage\Facade
 */
abstract class AbstractFacadeRoute
{
    /** @var HttpRequestMethod $method */
    public static HttpRequestMethod $method = HttpRequestMethod::GET;

    /**
     * Return the resource path
     *
     * @return string The resource path of the URL (without preceding slash)
     */
    abstract public function path(): string;

    /**
     * @param AbstractDataObject $dataObject
     */
    #[NoReturn]
    public function __construct(
        protected readonly AbstractDataObject $dataObject
    ) { }
}