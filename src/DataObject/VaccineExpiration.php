<?php

namespace CBW\QMessage\DataObject;

use DateTimeInterface;
use Symfony\Component\Serializer\Annotation as Serializer;

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
    public string $vaccineName;

    /**
     * @var DateTimeInterface
     */
    #[Serializer\Groups(["default", "accept"])]
    public DateTimeInterface $vaccineExpirationDate;
}
