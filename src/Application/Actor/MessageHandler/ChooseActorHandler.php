<?php
declare(strict_types=1);

namespace App\Actor\MessageHandler;

use Domain\Actor\Actor;
use Domain\Actor\Query\ChooseActor;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class ChooseActorHandler implements MessageHandlerInterface
{
    public function __invoke(ChooseActor $query): Actor
    {
        return new Actor(Uuid::uuid4());
    }
}
