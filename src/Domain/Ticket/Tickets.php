<?php
declare(strict_types=1);

namespace Domain\Ticket;

use Ramsey\Uuid\UuidInterface;

interface Tickets
{
    /**
     * @throws TicketNotFoundException
     */
    public function getById(UuidInterface $id): Ticket;

    public function save(Ticket $ticket): void;
}
