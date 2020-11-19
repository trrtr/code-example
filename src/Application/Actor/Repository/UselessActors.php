<?php
declare(strict_types=1);

namespace App\Actor\Repository;

use Domain\Actor\Actor;
use Domain\Actor\Actors;
use Ramsey\Uuid\UuidInterface;

final class UselessActors implements Actors
{
    /**
     * @var Actor[]
     */
    private array $actors = [];

    public function getById(UuidInterface $id): Actor
    {
        return $this->actors[$id->toString()] ?? new Actor($id);
    }

    public function save(Actor $actor): void
    {
        $this->actors[$actor->id()->toString()] = $actor;
    }
}
