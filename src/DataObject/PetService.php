<?php

namespace CBW\QMessage\DataObject;

use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class PetService
 * @package CBW\QMessage\DataObject
 */
final class PetService extends AbstractDataObject
{
    /**
     * @var string $petName
     */
    #[Serializer\Groups(["default", "accept"])]
    public string $petName;

    /**
     * @var string $serviceName
     */
    #[Serializer\Groups(["default", "accept"])]
    public string $serviceName;

}