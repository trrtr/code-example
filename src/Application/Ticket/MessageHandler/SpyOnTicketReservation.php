<?php
declare(strict_types=1);

namespace App\Ticket\MessageHandler;

use App\Spy\ActivityReport;
use App\Spy\ActivitySpy;
use Domain\Ticket\Event\TicketReserved;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class SpyOnTicketReservation implements MessageHandlerInterface
{
    private ActivitySpy $activitySpy;

    public function __construct(ActivitySpy $activitySpy)
    {
        $this->activitySpy = $activitySpy;
    }

    public function __invoke(TicketReserved $event): void
    {
        $this->activitySpy->spy(new ActivityReport($event->ticketId()));
    }
}
