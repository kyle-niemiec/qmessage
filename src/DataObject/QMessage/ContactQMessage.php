<?php

namespace CBW\QMessage\DataObject\QMessage;

use CBW\QMessage\DataObject\Contact;
use CBW\QMessage\DataObject\QMessage;

/**
 * Class ContactQMessage
 * @package CBW\QMessage\DataObject\QMessage
 */
final class ContactQMessage extends QMessage
{
    /** @var Contact[] $data The serialized data-objects */
    #[Serializer\Groups(["default", "accept"])]
    public array $data;
}