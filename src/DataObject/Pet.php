<?php

namespace CBW\QMessage\DataObject;

use DateTime;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class Pet
 * @package CBW\QMessage\DataObject
 */
class Pet extends AbstractDataObject
{
    /**
     * @var int
     */
    #[Serializer\Groups(["default", "accept"])]
    public int $id;

    /**
     * @var string
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("first_name")]
    public string $firstName;

    /**
     * @var string
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("last_name")]
    public string $lastName;

    /**
     * @var DateTime|null
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("date_of_birth")]
    public ?DateTime $dateOfBirth;

    /**
     * @var int
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("franchise_id")]
    public int $franchiseId;

    /**
     * @var int
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("status_id")]
    public int $statusId;

    /**
     * @var string|null
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("s3_photo")]
    public ?string $s3Photo;

    /**
     * @var string|null
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("primary_breed")]
    public ?string $primaryBreed;

    /**
     * @var string|null
     */
    #[Serializer\Groups(["default", "accept"])]
    #[Serializer\SerializedName("primary_color")]
    public ?string $primaryColor;
}