<?php
declare(strict_types=1);

namespace App\Ticket\Repository;

use Domain\Ticket\Ticket;
use Domain\Ticket\Tickets;
use Ramsey\Uuid\UuidInterface;

final class UselessTickets implements Tickets
{
    /**
     * @var Ticket[]
     */
    private array $tickets = [];

    public function getById(UuidInterface $id): Ticket
    {
        return $this->tickets[$id->toString()] ?? new Ticket($id);
    }

    public function save(Ticket $ticket): void
    {
        $this->tickets[$ticket->id()->toString()] = $ticket;
    }
}
