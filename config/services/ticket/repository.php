<?php

use App\Actor\Repository\UselessActors;
use App\Ticket\Repository\UselessTickets;
use Domain\Actor\Actors;
use Domain\Ticket\Tickets;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return function (ContainerConfigurator $configurator) {
    $services = $configurator->services()->defaults()
        ->autowire()
        ->autoconfigure()
    ;

    $services->load('App\\Ticket\\Repository\\', '../../../src/Application/Ticket/Repository');

    $services->alias(Tickets::class, UselessTickets::class);
};
