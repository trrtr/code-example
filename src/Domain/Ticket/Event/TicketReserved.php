<?php
declare(strict_types=1);

namespace Domain\Ticket\Event;

use Domain\Loggable;
use Domain\LogLevel;
use Ramsey\Uuid\UuidInterface;

final class TicketReserved implements Loggable
{
    private UuidInterface $ticketId;

    public function __construct(UuidInterface $ticketId)
    {
        $this->ticketId = $ticketId;
    }

    public function ticketId(): UuidInterface
    {
        return $this->ticketId;
    }

    public function level(): LogLevel
    {
        return LogLevel::INFO();
    }

    public function message(): string
    {
        return 'Ticket reserved';
    }

    public function params(): array
    {
        return [
            'ticketId' => $this->ticketId->toString(),
        ];
    }
}
