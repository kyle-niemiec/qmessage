<?php

namespace CBW\QMessage\DataObject\QMessage;

use CBW\QMessage\DataObject\QMessage;
use CBW\QMessage\DataObject\Reservation;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class ReservationQMessage
 * @package CBW\QMessage\DataObject\QMessage
 */
final class ReservationQMessage extends QMessage
{
    /**
     * @var Reservation[] $data The serialized data-objects
     */
    #[Serializer\Groups(["default", "accept"])]
    public array $data = [];

}
