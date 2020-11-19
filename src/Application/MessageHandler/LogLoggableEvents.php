<?php
declare(strict_types=1);

namespace App\MessageHandler;

use Domain\Loggable;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class LogLoggableEvents implements MessageHandlerInterface
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(Loggable $event): void
    {
        $level = $event->level()->getValue();
        $this->logger->$level($event->message(), $event->params());
    }
}
