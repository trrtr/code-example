<?php
declare(strict_types=1);

namespace App\Actor\MessageHandler;

use App\Spy\ActivityReport;
use App\Spy\ActivitySpy;
use Domain\Actor\Event\ActorReserved;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class SpyOnActorReservation implements MessageHandlerInterface
{
    private ActivitySpy $activitySpy;

    public function __construct(ActivitySpy $activitySpy)
    {
        $this->activitySpy = $activitySpy;
    }

    public function __invoke(ActorReserved $event): void
    {
        $this->activitySpy->spy(new ActivityReport($event->actorId()));
    }
}
