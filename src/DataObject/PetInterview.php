<?php

namespace CBW\QMessage\DataObject;

use DateTime;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class Pet
 * @package CBW\QMessage\DataObject
 */
class PetInterview extends AbstractDataObject
{
    /**
     * The email of the contact to send the confirmation to.
     *
     * This email will relate to an active member email in the franchise.
     *
     * @var string
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("email")]
    public string $email;

    /**
     * The id of the location to send the confirmation for.
     *
     * This id will relate to an active location and account that exists in the Emma platform.
     *
     * @var int
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("camp_id")]
    public int $campId;

    /**
     * @var DateTime
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("interview_date")]
    public DateTime $interviewDate;

    /**
     * @var string
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("note")]
    public string $note;

    /**
     * A formatted string of all the pets on this reservation.
     *
     * @var Pet
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("pet_event")]
    public Pet $petEvent;

    /**
     * @var Contact
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("contact_event")]
    public Contact $contactEvent;

    /**
     * @var string|null
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("powerform_url")]
    public ?string $powerformUrl;
}
