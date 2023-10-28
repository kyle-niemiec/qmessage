<?php

namespace CBW\QMessage\DataObject;

use \DateTimeInterface;
use Symfony\Component\Serializer\Annotation as Serializer;
use CBW\QMessage\DataObject\VaccineExpiration;

/**
 * Class PetVaccineExpiration
 * @package CBW\QMessage\DataObject
 */
final class PetVaccineExpiration extends AbstractDataObject
{
    /**
     * @var int
     */
    #[Serializer\Groups(["default", "accept"])]
    public $petId;

    /**
     * @var string
     */
    #[Serializer\Groups(["default", "accept"])]
    public $petName;

    /**
     * @var VaccineExpiration[]
     */
    #[Serializer\Groups(["default", "accept"])]
    public $vaccines;
}
