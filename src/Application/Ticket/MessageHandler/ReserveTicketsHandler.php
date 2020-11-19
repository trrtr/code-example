<?php
declare(strict_types=1);

namespace App\Ticket\MessageHandler;

use Domain\Actor\Actors;
use Domain\Ticket\Command\ReserveTickets;
use Domain\Ticket\Event\TicketReserved;
use Domain\Ticket\Tickets;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

final class ReserveTicketsHandler implements MessageHandlerInterface
{
    private Actors $actors;

    private Tickets $tickets;

    private MessageBusInterface $eventBus;

    public function __construct(
        Actors $actors,
        Tickets $tickets,
        MessageBusInterface $eventBus
    ) {
        $this->actors = $actors;
        $this->tickets = $tickets;
        $this->eventBus = $eventBus;
    }

    public function __invoke(ReserveTickets $command): void
    {
        $reservingActor = $this->actors->getById($command->actorId());
        foreach ($command->ticketIds() as $ticketId) {
            $ticket = $this->tickets->getById($ticketId);
            $ticket->reserve($reservingActor);
            $this->tickets->save($ticket);
            $this->eventBus->dispatch(new TicketReserved($ticketId));
        }
    }
}
