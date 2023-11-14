<?php

namespace CBW\QMessage\DataObject;

use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class AbstractDataObject
 * @package CBW\QMessage\DataObject
 */
abstract class AbstractDataObject
{
    /**
     * Serialize the data-object to a JSON string.
     *
     * @param SerializerInterface $serializer
     *
     * @return string
     */
    final public function serialize(
        SerializerInterface $serializer,
    ): string
    {
        return $serializer->serialize(
            data: $this,
            format: 'json',
            context: ['groups' => 'default']
        );
    }

    /**
     * Deserialize a string into the static data-object.
     *
     * @param SerializerInterface $serializer
     * @param string $dataObject
     *
     * @return $this
     */
    final public static function deserialize(
        SerializerInterface $serializer,
        string $dataObject
    ): static
    {
        return $serializer->deserialize(
            data: $dataObject,
            type: static::class,
            format: 'json',
            context: ['groups' => 'accept']
        );
    }
}