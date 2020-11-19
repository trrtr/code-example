<?php
declare(strict_types=1);

namespace Domain\Actor;

use Ramsey\Uuid\UuidInterface;

interface Actors
{
    /**
     * @throws ActorNotFoundException
     */
    public function getById(UuidInterface $id): Actor;

    public function save(Actor $actor): void;
}
