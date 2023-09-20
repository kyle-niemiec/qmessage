<?php

namespace CBW\QMessage\DataObject;

use CBW\QMessage\DataObject\QMessage\ReservationQMessage;
use CBW\QMessage\Enumeration\EventType;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class QMessage
 * @package CBW\QMessage\DataObject
 */
class QMessage extends AbstractDataObject
{
    /** @var string $event */
    #[Serializer\Groups(["default", "accept"])]
    public string $event;

    /** @var int $timestamp */
    #[Serializer\Groups(["default", "accept"])]
    public int $timestamp;

    /** @var string $traceId */
    #[Serializer\Groups(["default", "accept"])]
    public string $traceId;

    /** @var string $source */
    #[Serializer\Groups(["default", "accept"])]
    public string $source;

    /** @var int $attempts */
    #[Serializer\Groups(["default", "accept"])]
    public int $attempts;

    /** @var AbstractDataObject[] $data The serialized data-objects */
    #[Serializer\Groups(["default", "accept"])]
    public array $data;

    /** @var int $franchiseId */
    #[Serializer\Ignore()]
    public int $franchiseId;

    /**
     * Generate a specific QMessage FQCN based on an event type.
     *
     * @param string $event
     *
     * @throws DataObjectException
     * @return string FQCN of QMessage subtype
     */
    final public static function getQMessageFQCN(string $event): string
    {
        $eventsMessageTypes = [
            EventType::ARCHIVE_CONTACT->value => ContactQMessage::class,
            EventType::CREATE_BOARDING->value => ReservationQMessage::class,
            EventType::CREATE_CONTACT->value => ContactQMessage::class,
            EventType::CREATE_INTERVIEW->value => ReservationQMessage::class,
            EventType::DAYCARE_CONFIRMATION->value => ReservationQMessage::class,
//            EventType::EXPIRING_VACCINE->value => VaccineQMessage::class,
            EventType::NEW_LEAD->value => ContactQMessage::class,
//            EventType::PASSED_INTERVIEW->value => PetInterviewQMessage::class,
//            EventType::RESERVATION_REMINDER->value => ReservationReminderQMessage::class,
//            EventType::THANK_YOU->value => ContactQMessage::class,
            EventType::UPDATE_CONTACT->value => ContactQMessage::class,
//            'registration_new_customer': 'App\QMessage\DataObject\AccountEvent',
//            'registration_existing_customer': 'App\QMessage\DataObject\AccountEvent',
//            'reservation_declined': 'App\QMessage\DataObject\ReservationEvent',
        ];

        $event_registered = array_key_exists($event, $eventsMessageTypes);

        if (! $event_registered) {
            $message = vsprintf(
                format: "The event type '%s' has no data-object registration in %s",
                values: [
                    $event,
                    __METHOD__
                ]
            );

            throw new DataObjectException($message);
        }

        return $eventsMessageTypes[$event];
    }
}