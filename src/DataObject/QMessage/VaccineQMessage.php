<?php

namespace CBW\QMessage\DataObject\QMessage;

use CBW\QMessage\DataObject\QMessage;
use CBW\QMessage\DataObject\VaccineData;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class ContactQMessage
 * @package CBW\QMessage\DataObject\QMessage
 */
final class VaccineQMessage extends QMessage
{
    /**
     * @var VaccineData[] $data The serialized data-objects
     */
    #[Serializer\Groups(["default", "accept"])]
    public array $data = [];

}
