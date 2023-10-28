<?php

namespace CBW\QMessage\DataObject\QMessage;

use CBW\QMessage\DataObject\QMessage;
use CBW\QMessage\DataObject\ReservationReminder;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class ReservationReminderQMessage
 * @package CBW\QMessage\DataObject\QMessage
 */
final class ReservationReminderQMessage extends QMessage
{
    /**
     * @var ReservationReminder[] $data The serialized data-objects
     */
    #[Serializer\Groups(["default", "accept"])]
    public array $data = [];

}
