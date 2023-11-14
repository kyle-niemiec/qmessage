<?php

namespace CBW\QMessage\DataObject;

use Symfony\Component\Serializer\Annotation as Serializer;

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
    public Franchise $franchise;

    /**
     * @var PetVaccineExpiration[]
     */
    #[Serializer\Groups(["default", "accept"])]
    public array $pets;

    /**
     * @var Contact
     */
    #[Serializer\Groups(["default", "accept"])]
    public Contact $owner;
}
