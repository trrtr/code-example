<?php
declare(strict_types=1);

namespace Domain\Actor;

use Ramsey\Uuid\UuidInterface;

final class Actor
{
    private UuidInterface $id;

    private ActorStatus $status;

    public function __construct(UuidInterface $id)
    {
        $this->id = $id;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function reserve(): void
    {
        $this->status = ActorStatus::RESERVED();
    }
}
