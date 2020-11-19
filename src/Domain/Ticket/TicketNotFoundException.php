<?php
declare(strict_types=1);

namespace Domain\Ticket;

use Ramsey\Uuid\UuidInterface;
use RuntimeException;

final class TicketNotFoundException extends RuntimeException
{
    public static function create(UuidInterface $ticketId): self
    {
        return new self(sprintf('Ticket with id=%s not found.', $ticketId->toString()));
    }
}
