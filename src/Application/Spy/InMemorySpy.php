<?php
declare(strict_types=1);

namespace App\Spy;

use Ramsey\Uuid\UuidInterface;

final class InMemorySpy implements ActivitySpy
{
    /**
     * @var UuidInterface[]
     */
    private array $reports = [];

    public function spy(ActivityReport $report): void
    {
        $this->reports[] = $report->id();
    }

    public function reports(): array
    {
        return $this->reports;
    }
}
