<?php
declare(strict_types=1);

namespace Domain\Ticket\Executor;

use Domain\Ticket\ExecutionFailureException;
use Ramsey\Uuid\UuidInterface;

final class RandomlyFailingExecutor implements Executor
{
    private Executor $executor;

    public function __construct(Executor $executor)
    {
        $this->executor = $executor;
    }

    public function execute(UuidInterface $actorId, UuidInterface $ticketId): void
    {
        if (random_int(0, 1) === 1) {
            $this->executor->execute($actorId, $ticketId);

            return;
        }

        throw ExecutionFailureException::new();
    }
}
