<?php
declare(strict_types=1);

namespace App\Actor\MessageHandler;

use Domain\Actor\Actors;
use Domain\Actor\Command\ExecuteTickets;
use Domain\Ticket\Event\TicketFailed;
use Domain\Ticket\Event\TicketUsedSuccessfully;
use Domain\Ticket\ExecutionFailureException;
use Domain\Ticket\Executor\Executor;
use Domain\Ticket\Tickets;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

final class ExecuteTicketsHandler implements MessageHandlerInterface
{
    private Actors $actors;

    private Tickets $tickets;

    private MessageBusInterface $eventBus;

    private Executor $executor;

    public function __construct(
        Actors $actors,
        Tickets $tickets,
        MessageBusInterface $eventBus,
        Executor $executor
    ) {
        $this->actors = $actors;
        $this->tickets = $tickets;
        $this->eventBus = $eventBus;
        $this->executor = $executor;
    }

    public function __invoke(ExecuteTickets $command): void
    {
        $actor = $this->actors->getById($command->actorId());
        $tickets = array_map(fn(UuidInterface $id) => $this->tickets->getById($id), $command->ticketIds());
        foreach ($tickets as $ticket) {
            try {
                $this->executor->execute($actor->id(), $ticket->id());
                $this->eventBus->dispatch(new TicketUsedSuccessfully($ticket->id(), $actor->id()));
            } catch (ExecutionFailureException $exception) {
                $this->eventBus->dispatch(new TicketFailed($ticket->id(), $actor->id()));
            }
        }
    }
}
