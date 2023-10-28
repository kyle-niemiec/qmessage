<?php

namespace CBW\QMessage\DataObject;

use DateTime;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class ReservationReminder
 * @package CBW\QMessage\DataObject
 */
final class ReservationReminder extends AbstractDataObject
{
    /**
     * @var string $email Email of active member to send the confirmation
     */
    #[Serializer\Groups(["default", "accept"])]
    public string $email;

    /**
     * @var int $campId ID of active location and account in the Emma platform.
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("camp_Id")]
    public int $campId;

    /**
     * @var string $locationName String of the location to send the confirmation.
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("location_name")]
    public string $locationName;

    /**
     * @var string $locationEmail String of the email to send the confirmation.
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("location_email")]
    public string $locationEmail;

    /**
     * @var string $locationPhone Phone of the location to send the confirmation for.
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("location_phone")]
    public string $locationPhone;

    /**
     * @var string $locationAddress Address of the location to send the confirmation for.
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("location_address")]
    public string $locationAddress;

    /**
     * @var string $pets Formatted string of all the pets on this reservation.
     */
    #[Serializer\Groups(["default", "accept"])]
    public string $pets;

    /**
     * @var string $services Formatted string of the services for this reservation.
     */
    #[Serializer\Groups(["default", "accept"])]
    public string $services;

    /**
     * @var DateTime $checkinDate Start date of reservation. Format: MM/DD/YYYY.
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("check_in_date")]
    public DateTime $checkinDate;

    /**
     * @var DateTime $checkoutDate End date of reservation. Format: MM/DD/YYYY.
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("check_out_date")]
    public DateTime $checkoutDate;
}
