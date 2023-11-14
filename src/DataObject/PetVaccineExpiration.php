<?php

namespace CBW\QMessage\DataObject;

use Symfony\Component\Serializer\Annotation as Serializer;

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
    public int $petId;

    /**
     * @var string
     */
    #[Serializer\Groups(["default", "accept"])]
    public string $petName;

    /**
     * @var VaccineExpiration[]
     */
    #[Serializer\Groups(["default", "accept"])]
    public array $vaccines;
}
