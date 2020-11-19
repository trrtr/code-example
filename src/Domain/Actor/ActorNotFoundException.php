<?php
declare(strict_types=1);

namespace Domain\Actor;

use Ramsey\Uuid\UuidInterface;
use RuntimeException;

final class ActorNotFoundException extends RuntimeException
{
    public static function create(UuidInterface $actorId): self
    {
        return new self(sprintf('Actor with id=%s not found.', $actorId->toString()));
    }
}
