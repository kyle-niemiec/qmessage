<?php

namespace CBW\QMessage\DataObject\Traits;

use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Trait VoxieTraits
 * @package App\QMessage\DataObject\Traits
 */
trait VoxieTraits
{
    /**
     * @var int|null $voxieTeamId
     */
    #[Serializer\Groups(["default", "accept"])]
    public ?int $voxieTeamId;

    /**
     * @var string|null $phoneNumber
     */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $phoneNumber;

}
