<?php

namespace CBW\QMessage\DataObject;

use \DateTimeInterface;
use Symfony\Component\Serializer\Annotation as Serializer;
use CBW\QMessage\DataObject\Franchise;
use CBW\QMessage\DataObject\PetVaccineExpiration;

/**
 * Class VaccineData
 * @package CBW\QMessage\DataObject
 */
final class VaccineData extends AbstractDataObject
{
    /**
     * @var Franchise
     */
    #[Serializer\Groups(["default", "accept"])]
    protected $franchise;

    /**
     * @var PetVaccineExpiration[]
     */
    #[Serializer\Groups(["default", "accept"])]
    protected $pets;

    /**
     * @var Contact
     */
    #[Serializer\Groups(["default", "accept"])]
    protected $owner;
}
