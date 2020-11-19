<?php
declare(strict_types=1);

namespace Domain\Ticket\Executor;

use Ramsey\Uuid\UuidInterface;

final class UselessExecutor implements Executor
{
    public function __construct()
    {
    }

    public function execute(UuidInterface $actorId, UuidInterface $ticketId): void
    {
    }
}
