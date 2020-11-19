<?php
declare(strict_types=1);

namespace App\Cli;

use Domain\Actor\Actor;
use Domain\Actor\Command\ExecuteTickets;
use Domain\Actor\Command\ReserveActor;
use Domain\Actor\Query\ChooseActor;
use Domain\Ticket\Command\ReserveTickets;
use Domain\Ticket\Query\ChooseTickets;
use Domain\Ticket\Ticket;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class Run extends Command
{
    use HandleTrait;

    private MessageBusInterface $commandBus;

    private MessageBusInterface $queryBus;

    public function __construct(
        MessageBusInterface $commandBus,
        MessageBusInterface $queryBus
    ) {
        parent::__construct();
        $this->commandBus = $commandBus;
        $this->messageBus = $queryBus;
    }

    protected function configure()
    {
        $this
            ->setName('app:run')
            ->addArgument('ticketCount', InputArgument::OPTIONAL, 'How many tickets to execute', 3)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Actor $actor */
        $actor = $this->handle(new ChooseActor());
        $this->commandBus->dispatch(new ReserveActor($actor->id()));

        /** @var Ticket[] $tickets */
        $tickets = $this->handle(new ChooseTickets($actor->id(), (int)$input->getArgument('ticketCount')));
        $ticketIds = array_map(fn(Ticket $ticket) => $ticket->id(), $tickets);
        $this->commandBus->dispatch(new ReserveTickets(
            $actor->id(),
            ...$ticketIds
        ));

        $this->commandBus->dispatch(new ExecuteTickets($actor->id(), ...$ticketIds));

        return self::SUCCESS;
    }
}
