<?php

use App\EventListener\ReleaseActors;
use App\EventListener\ReleaseTickets;
use Symfony\Component\Console\Event\ConsoleTerminateEvent;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return function (ContainerConfigurator $configurator) {
    $services = $configurator->services()->defaults()
        ->autowire()
        ->autoconfigure()
    ;

    $services->set(ReleaseActors::class)
        ->args([service('app.spy.actor_reserved')])
        ->tag('kernel.event_listener', ['event' => ConsoleTerminateEvent::class])
    ;

    $services->set(ReleaseTickets::class)
        ->args([service('app.spy.ticket_reserved')])
        ->tag('kernel.event_listener', ['event' => ConsoleTerminateEvent::class])
    ;
};
