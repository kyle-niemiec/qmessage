<?php

namespace CBW\QMessage\DataObject\Traits;

use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Trait SQSTraits
 * @package App\QMessage\DataObject\Traits
 */
trait SQSTraits
{
    /**
     * @var int|null $timestamp
     */
    #[Serializer\Groups(["default", "accept"])]
    public ?int $timestamp;

    /**
     * @var string|null $traceId
     */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $traceId;

    /**
     * @var string|null $source
     */
    #[Serializer\Groups(["default", "accept"])]
    public ?string $source;

    /**
     * @var int|null $attempts
     */
    #[Serializer\Groups(["default", "accept"])]
    public ?int $attempts;

}
