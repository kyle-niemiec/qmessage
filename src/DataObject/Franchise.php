<?php

namespace CBW\QMessage\DataObject;

use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class Franchise
 * @package CBW\QMessage\DataObject
 */
final class Franchise extends AbstractDataObject
{
    /**
     * @var integer $id
     */
    #[Serializer\Groups(["default", "accept"])]
    public int $id;

    /**
     * @var string $name
     */
    #[Serializer\Groups(["default", "accept"])]
    public string $name = '';

    /**
     * @var string $address1
     */
    #[Serializer\Groups(["default", "accept"])]
    public string $address1 = '';

    /**
     * @var string|null $address2
     */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $address2;

    /**
     * @var string $city
     */
    #[Serializer\Groups(["default", "accept"])]
    public string $city = '';

    /**
     * @var string $state
     */
    #[Serializer\Groups(["default", "accept"])]
    public string $state = '';

    /**
     * @var string $zipcode
     */
    #[Serializer\Groups(["default", "accept"])]
    public string $zipcode = '';

    /**
     * @var string|null $country
     */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $country = 'us';

    /**
     * @var string $telephone
     */
    #[Serializer\Groups(["default", "accept"])]
    public string $telephone = '';

    /**
     * @var string|null $fax
     */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $fax;

    /**
     * @var string $timezone
     */
    #[Serializer\Groups(["default", "accept"])]
    public string $timezone = 'US/Mountain';

    /**
     * @var string|null $geocode
     */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $geocode;

    /**
     * @var string|null $email
     */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $email;

    /**
     * @var string|null $longEmails
     */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $longEmails;

    /**
     * @var integer|null $statusId
     */
    #[Serializer\Groups(["default", "accept"])]
    public ?int $statusId;

    /**
     * @var bool|null $inBeta
     */
    #[Serializer\Groups(["default", "accept"])]
    public ?bool $inBeta = false;

    /**
     * @var bool|null $msgAppOptIn
     */
    #[Serializer\Groups(["default", "accept"])]
    public ?bool $msgAppOptIn = true;

    /**
     * @var integer|null $msgAppInterval
     */
    public ?int $msgAppInterval = 18;

    /**
     * @var bool|null $isCorporateCamp
     */
    #[Serializer\Groups(["default", "accept"])]
    public ?bool $isCorporateCamp = false;

    /**
     * @var string|null $powerformUrl
     */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $powerformUrl;

}