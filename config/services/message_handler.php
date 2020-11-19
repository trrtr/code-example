<?php

use App\MessageHandler\LogLoggableEvents;
use Domain\Ticket\Event\TicketReserved;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return function (ContainerConfigurator $configurator) {
    $services = $configurator->services()->defaults()
        ->autowire()
        ->autoconfigure()
    ;

    $services->load('App\\MessageHandler\\', '../../src/Application/MessageHandler/');
};
