<?php

namespace CBW\QMessage\Mediator;

use CBW\QMessage\DataObject\QMessage;
use Psr\Log\LoggerInterface;

/**
 * Class AbstractMediator
 * @package App\QMessage\Mediator
 */
abstract class AbstractMediator
{
    /**
     * Construct the mediator with a logger
     *
     * @param LoggerInterface $logger The application logger
     */
    #[NoReturn]
    public function __construct(
        protected readonly LoggerInterface $logger,
        protected readonly Converter $converter,
        protected readonly Facade $facade
    ) { }

    /**
     * Process a {@see QMessage}
     *
     * @param QMessage $message
     */
    public function process(QMessage $message): void
    {
        $this->logger->log(sprintf(
            'Event "%s" being processed: %s',
            $message->getEvent(),
            $message->getData()
        ));
    }
}