<?php
declare(strict_types=1);

namespace Domain\Actor\Event;

use Ramsey\Uuid\UuidInterface;

final class ActorReserved
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
