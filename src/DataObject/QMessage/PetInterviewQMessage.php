<?php

namespace CBW\QMessage\DataObject\QMessage;

use CBW\QMessage\DataObject\PetInterview;
use CBW\QMessage\DataObject\QMessage;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class PetInterviewQMessage
 * @package CBW\QMessage\DataObject\QMessage
 */
final class PetInterviewQMessage extends QMessage
{
    /**
     * @var PetInterview[] $data The serialized data-objects
     */
    #[Serializer\Groups(["default", "accept"])]
    public array $data;
}