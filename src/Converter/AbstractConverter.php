<?php

namespace CBW\QMessage\Converter;

use CBW\QMessage\DataObject\AbstractDataObject;
use CBW\QMessage\DataObject\QMessage;
use Error;

/**
 * Class AbstractConverter
 * @package CBW\QMessage\Converter
 */
abstract class AbstractConverter
{
    /**
     * Return the FQCN of the data-object being converted to.
     *
     * @return string
     */
    abstract public static function targetFqcn(): string;

    /**
     * Return a map of properties from the source data-object to the target
     * data-object.
     *
     * @return array The associative map of data-object values from target to
     *               source.
     */
    abstract public function map(): array;

    /**
     * Construct the converter with access to the original QMessage context.
     *
     * @param QMessage $message
     */
    #[NoReturn]
    public function __construct(
        protected readonly QMessage $message
    ) { }

    /**
     * Convert a QMessage data-object to a facade data-object.
     *
     * @param AbstractDataObject $sourceDataObject
     *
     * @throws ConverterException Thrown if the FQCN is not an {@see AbstractDataObject}
     * @return AbstractDataObject The target data-object converted to
     */
    final public function convert(
        AbstractDataObject $sourceDataObject
    ): AbstractDataObject
    {
        // Catch non-existent FQCN errors
        try {
            $targetDataObject = new (static::targetFqcn());
        } catch (Error) {
            $message = vsprintf(
                format: "The target FQCN (%s) for the converter %s was not found.",
                values: [
                    static::targetFqcn(),
                    static::class
                ]
            );

            throw new ConverterException($message);
        }

        // Catch FQCN invalid subclass errors
        if (! is_subclass_of($targetDataObject, AbstractDataObject::class)) {
            $message = vsprintf(
                format: "The target FQCN (%s) for converter %s is not a valid %s.",
                values: [
                    static::targetFqcn(),
                    static::class,
                    AbstractDataObject::class
                ]
            );

            throw new ConverterException($message);
        }

        // Assign properties from source->target
        foreach (static::map() as $targetProp => $sourceProp) {
            if (is_callable($sourceProp)) {
                $targetDataObject->$targetProp = $sourceProp($sourceDataObject, $targetProp);
            } else {
                $targetDataObject->$targetProp = $sourceDataObject->$sourceProp;
            }
        }

        return $targetDataObject;
    }
}