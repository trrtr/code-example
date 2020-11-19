<?php
declare(strict_types=1);

namespace Domain\Ticket\Executor;

use Ramsey\Uuid\UuidInterface;

interface Executor
{
    public function execute(UuidInterface $actorId, UuidInterface $ticketId): void;
}
