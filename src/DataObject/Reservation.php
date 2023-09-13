<?php

namespace CBW\QMessage\DataObject;

use \DateTime;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class Reservation
 * @package CBW\QMessage\DataObject
 */
final class Reservation extends AbstractDataObject
{
    /** @var Contact $customer */
    #[Serializer\Groups(["default", "accept"])]
    public Contact $customer;

    /** @var DateTime $checkInDateTime */
    #[Serializer\Groups(["default", "accept"])]
    public DateTime $checkInDateTime;

    /** @var DateTime $checkOutDateTime */
    #[Serializer\Groups(["default", "accept"])]
    public DateTime $checkOutDateTime;

    /** @var Franchise $franchise */
    #[Serializer\Groups(["default", "accept"])]
    public Franchise $franchise;

    /** @var string|null $primaryReservationService */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $primaryReservationService;

    /** @var PetService[] $petServices */
    #[Serializer\Groups(["default", "accept"])]
    public array $petServices;

}
