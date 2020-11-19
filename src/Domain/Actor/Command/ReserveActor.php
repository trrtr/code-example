<?php
declare(strict_types=1);

namespace Domain\Actor\Command;

use Ramsey\Uuid\UuidInterface;

final class ReserveActor
{
    private UuidInterface $actorId;

    public function __construct(UuidInterface $actorId)
    {
        $this->actorId = $actorId;
    }

    public function actorId(): UuidInterface
    {
        return $this->actorId;
    }
}
