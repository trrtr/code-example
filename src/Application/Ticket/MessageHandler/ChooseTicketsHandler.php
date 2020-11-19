<?php
declare(strict_types=1);

namespace App\Ticket\MessageHandler;

use Domain\Ticket\Query\ChooseTickets;
use Domain\Ticket\Ticket;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class ChooseTicketsHandler implements MessageHandlerInterface
{
    public function __invoke(ChooseTickets $query): array
    {
        return array_map(fn() => new Ticket(Uuid::uuid4()), array_fill(0, $query->ticketCount(), 1));
    }
}
