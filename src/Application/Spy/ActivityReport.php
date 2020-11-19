<?php
declare(strict_types=1);

namespace App\Spy;

use Ramsey\Uuid\UuidInterface;

final class ActivityReport
{
    private UuidInterface $id;

    public function __construct(UuidInterface $id)
    {
        $this->id = $id;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }
}
