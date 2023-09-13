<?php

namespace CBW\QMessage\DataObject;

use \DateTimeInterface;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class Contact
 * @package CBW\QMessage\DataObject
 */
final class Contact extends AbstractDataObject
{
    /** @var int $id */
    #[Serializer\Groups(["default", "accept"])]
    public int $id;

    /** @var string $firstName */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("first_name")]
    public ?string $firstName;

    /** @var string|null $lastName */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("last_name")]
    public ?string $lastName;

    /** @var string|null $address1 */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $address1;

    /** @var string|null $address2 */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $address2;

    /** @var string|null $city */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $city;

    /** @var string|null $state */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $state;

    /** @var string|null $zipcode */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $zipcode;

    /** @var string|null $geocode */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $geocode;

    /** @var string */
    #[Serializer\Groups(["default", "accept"])]
    public string $email;

    /** @var string $previousEmail */
    #[Serializer\Groups(["default", "accept"])]
    public string $previousEmail;

    /** @var string|null $url */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $url;

    /** @var string|null $phone */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $phone;

    /** @var array $campId */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("camp_id")]
    public array $campId = [];

    /** @var DateTimeInterface|null $lastReservation */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("last_reservation")]
    public ?DateTimeInterface $lastReservation;

    /** @var int|null $lastReservationLocationId */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("last_reservation_location_id")]
    public ?int $lastReservationLocationId;

    /** @var DateTimeInterface|null $nextReservation */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("next_reservation")]
    public ?DateTimeInterface $nextReservation;

    /** @var int|null $nextReservationLocationId */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("next_reservation_location_id")]
    public ?int $nextReservationLocationId;

    /** @var Franchise $contactFranchise */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("contact_franchise")]
    public Franchise $contactFranchise;

}