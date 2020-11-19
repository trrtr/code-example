<?php
declare(strict_types=1);

namespace Domain\Ticket\Event;

use Domain\Loggable;
use Domain\LogLevel;
use Ramsey\Uuid\UuidInterface;

final class TicketUsedSuccessfully implements Loggable
{
    private UuidInterface $ticketId;

    private UuidInterface $actorId;

    public function __construct(UuidInterface $ticketId, UuidInterface $actorId)
    {
        $this->ticketId = $ticketId;
        $this->actorId = $actorId;
    }

    public function level(): LogLevel
    {
        return LogLevel::INFO();
    }

    public function message(): string
    {
        return 'Ticket used successfully';
    }

    public function params(): array
    {
        return [
            'ticketId' => $this->ticketId->toString(),
            'actorId' => $this->actorId->toString(),
        ];
    }
}
