<?php
declare(strict_types=1);

namespace Domain\Ticket;

use Domain\Actor\Actor;
use Ramsey\Uuid\UuidInterface;

final class Ticket
{
    private UuidInterface $id;

    private UuidInterface $reservedBy;

    private TicketStatus $status;

    public function __construct(UuidInterface $id)
    {
        $this->id = $id;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function reserve(Actor $reservingActor): void
    {
        $this->reservedBy = $reservingActor->id();
        $this->status = TicketStatus::RESERVED();
    }
}
