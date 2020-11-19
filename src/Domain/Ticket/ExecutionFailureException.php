<?php
declare(strict_types=1);

namespace Domain\Ticket;

use RuntimeException;

class ExecutionFailureException extends RuntimeException
{
    public static function new(): self
    {
        return new self('Ticket execution failed');
    }
}
