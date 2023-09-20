<?php

namespace CBW\QMessage\Mediator;

use CBW\QMessage\Converter\ConverterException;
use CBW\QMessage\DataObject\QMessage;
use CBW\QMessage\Facade\AbstractFacade;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class Mediator
 * @package App\QMessage\Mediator
 */
class Mediator
{
    /**
     * Construct the mediator with a logger
     *
     * @param LoggerInterface $logger
     * @param Configurator $configurator
     * @param AbstractFacade $facade
     */
    #[NoReturn]
    public function __construct(
        protected readonly LoggerInterface $logger,
        protected readonly Configurator $configurator,
        protected readonly AbstractFacade $facade
    ) { }

    /**
     * Process a {@see QMessage}
     *
     * @param QMessage $message
     *
     * @throws ConfiguratorException
     * @throws ConverterException
     * @throws TransportExceptionInterface
     */
    public function mediate(QMessage $message): void
    {
        $this->logger->info(vsprintf(
            format: 'Event "%s" being mediated in: %s',
            values: [
                $message->event,
                static::class
            ]
        ));

        $converter = $this->configurator->generateConverter($message->event);

        foreach ($message->data as $sourceDataObject) {
            $route = $this->configurator->generateRoute($message->event, $sourceDataObject);
            $targetDataObject = $converter->convert($sourceDataObject);

            $this->facade->send(
                $route,
                $targetDataObject
            );
        }
    }
}