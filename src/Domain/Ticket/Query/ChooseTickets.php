<?php
declare(strict_types=1);

namespace Domain\Ticket\Query;

use Ramsey\Uuid\UuidInterface;

final class ChooseTickets
{
    private UuidInterface $actorId;

    private int $ticketCount;

    public function __construct(UuidInterface $actorId, int $ticketCount)
    {
        $this->actorId = $actorId;
        $this->ticketCount = $ticketCount;
    }

    public function actorId(): UuidInterface
    {
        return $this->actorId;
    }

    public function ticketCount(): int
    {
        return $this->ticketCount;
    }
}
