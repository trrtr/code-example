<?php
declare(strict_types=1);

namespace Domain\Ticket\Command;

use Ramsey\Uuid\UuidInterface;

final class ReserveTickets
{
    private UuidInterface $actorId;

    /**
     * @var UuidInterface[]
     */
    private array $ticketIds;

    public function __construct(UuidInterface $actorId, UuidInterface ...$ticketIds)
    {
        $this->actorId = $actorId;
        $this->ticketIds = $ticketIds;
    }

    public function actorId(): UuidInterface
    {
        return $this->actorId;
    }

    /**
     * @return UuidInterface[]
     */
    public function ticketIds(): array
    {
        return $this->ticketIds;
    }
}
