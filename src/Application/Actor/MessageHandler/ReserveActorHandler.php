<?php
declare(strict_types=1);

namespace App\Actor\MessageHandler;

use Domain\Actor\Actors;
use Domain\Actor\Command\ReserveActor;
use Domain\Actor\Event\ActorReserved;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

final class ReserveActorHandler implements MessageHandlerInterface
{
    private Actors $actors;

    private MessageBusInterface $eventBus;

    public function __construct(
        Actors $actors,
        MessageBusInterface $eventBus
    ) {
        $this->actors = $actors;
        $this->eventBus = $eventBus;
    }

    public function __invoke(ReserveActor $command): void
    {
        $actor = $this->actors->getById($command->actorId());
        $actor->reserve();
        $this->actors->save($actor);
        $this->eventBus->dispatch(new ActorReserved($actor->id()));
    }
}
