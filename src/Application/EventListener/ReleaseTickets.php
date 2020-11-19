<?php
declare(strict_types=1);

namespace App\EventListener;

use App\Spy\ActivitySpy;

final class ReleaseTickets
{
    private ActivitySpy $spy;

    public function __construct(ActivitySpy $spy)
    {
        $this->spy = $spy;
    }

    public function __invoke(): void
    {
        dump('releasing tickets from reservation');
    }
}
