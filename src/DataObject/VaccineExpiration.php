<?php

namespace CBW\QMessage\DataObject;

use \DateTimeInterface;
use Symfony\Component\Serializer\Annotation as Serializer;
use CBW\QMessage\DataObject\Franchise;

/**
 * Class VaccineExpiration
 * @package CBW\QMessage\DataObject
 */
final class VaccineExpiration extends AbstractDataObject
{
    /**
     * @var string
     */
    #[Serializer\Groups(["default", "accept"])]
    public $vaccineName;

    /**
     * @var DateTime
     */
    #[Serializer\Groups(["default", "accept"])]
    public $vaccineExpirationDate;
}
