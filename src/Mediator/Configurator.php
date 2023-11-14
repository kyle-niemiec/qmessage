<?php

namespace CBW\QMessage\Mediator;

use CBW\QMessage\Converter\AbstractConverter;
use CBW\QMessage\DataObject\AbstractDataObject;
use CBW\QMessage\DataObject\QMessage;
use CBW\QMessage\Facade\AbstractFacadeRoute;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class Configurator
 * @package CBW\QMessage\Mediator
 */
class Configurator
{
    /** @var array[] $configuration */
    protected static array $configuration = [];

    /**
     * @param ContainerInterface $container
     */
    #[NoReturn]
    public function __construct(
        protected readonly ContainerInterface $container
    ) { }

    /**
     * Set the configuration data from YAML. E.G.:
     *
     *  [
     *      "event_name": {
     *          "converter": "App\Converter\TestConverter",
     *          "mediator": "App\Mediator\TestMediator",
     *          "route": "App\Facade\AbstractFacadeRoute",
     *      },
     *
     *      ...
     *  ]
     *
     * @param array[] $configuration The associative array of event
     *                               registrations.
     *
     * @throws ConfiguratorException
     */
    final public static function setConfiguration(array $configuration): void
    {
        static::$configuration = $configuration;
        static::checkConfiguration();
    }

    /**
     * Check that the configuration is valid.
     * 
     * @throws ConfiguratorException
     * @return boolean True if okay, otherwise an error is thrown.
     */
    final public static function checkConfiguration(): bool
    {
        foreach (static::$configuration as $event => $config) {
            // Check event structure is valid
            if (! is_array($config)) {
                $message = vsprintf(
                    format: "Unknown object passed to %s for event %s",
                    values: [
                        static::class,
                        $event
                    ]
                );

                throw new ConfiguratorException($message);
            }

            $validKeys = [
                'converter' => AbstractConverter::class,
                'mediator' => Mediator::class,
                'route' => AbstractFacadeRoute::class,
            ];

            // Check all keys are valid properties of the structure
            foreach ($config as $componentKey => $componentFqcn) {

                if (! in_array($componentKey, array_keys($validKeys)) ) {
                    $message = vsprintf(
                        format: "An invalid component key (%s) was found in %s.",
                        values: [
                            $componentKey,
                            static::class
                        ]
                    );

                    throw new ConfiguratorException($message);
                } else {
                    static::validateComponent(
                        $componentKey,
                        $event,
                        $componentFqcn,
                        $validKeys[$componentKey]
                    );
                }

            }
        }

        return true;
    }

    /**
     * Validate a component or throw an error.
     *
     * @param string $component
     * @param string $event
     * @param string $componentFqcn
     * @param string $expectedFqcn
     *
     * @throws ConfiguratorException
     * @return bool
     */
    final protected static function validateComponent(
        string $component,
        string $event,
        string $componentFqcn,
        string $expectedFqcn
    ): bool
    {
        if (!is_subclass_of($componentFqcn, $expectedFqcn)) {
            $message = vsprintf(
                format: "%s received invalid %s for event %s. Found %s.",
                values: [
                    static ::class,
                    $component,
                    $event,
                    $componentFqcn
                ]
            );

            throw new ConfiguratorException($message);
        }

        return true;
    }

    /**
     * Generate a mediator for an event
     *
     * @param string $event
     *
     * @throws ConfiguratorException
     * @return Mediator
     */
    final public function generateMediator(
        string $event
    ): Mediator
    {
        self::verifyEvent($event, Mediator::class);
        /** @var Mediator $mediator */
        $mediator = $this->container->get(static::$configuration[$event]['mediator']);
        return $mediator;
    }

    /**
     * Generate a converter for an event
     *
     * @param QMessage $message
     * @return AbstractConverter
     * @throws ConfiguratorException
     */
    final public function generateConverter(QMessage $message): AbstractConverter
    {
        self::verifyEvent($message->event, AbstractConverter::class);
        /** @var AbstractConverter $converter */
        $converter = new static::$configuration[$message->event]['converter']($message);
        return $converter;
    }

    /**
     * Generate an {@see AbstractFacadeRoute} for an event
     *
     * @param string $event
     * @param AbstractDataObject $dataObject
     *
     * @throws ConfiguratorException
     * @return AbstractFacadeRoute
     */
    final public function generateRoute(
        string $event,
        AbstractDataObject $dataObject
    ): AbstractFacadeRoute
    {
        self::verifyEvent($event, AbstractFacadeRoute::class);
        /** @var AbstractFacadeRoute $route */
        $route = new static::$configuration[$event]['route']($dataObject);
        return $route;
    }

    /**
     * Verify an event is defined in the configuration or throw an error.
     * 
     * @param string $event
     * @param string $targetFqcn
     * 
     * @throws ConfiguratorException
     * @return void
     */
    private static function verifyEvent(
        string $event,
        string $targetFqcn
    ): void
    {
        if (! array_key_exists($event, static::$configuration)) {
            $message = vsprintf(
                format: "Event '%s' is not defined in %s, could not generate %s",
                values: [
                    $event,
                    static::class,
                    $targetFqcn
                ]
            );

            throw new ConfiguratorException($message);
        }
    }
}