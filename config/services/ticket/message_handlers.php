<?php

use App\Ticket\MessageHandler\SpyOnTicketReservation;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return function (ContainerConfigurator $configurator) {
    $services = $configurator->services()->defaults()
        ->autowire()
        ->autoconfigure()
    ;

    $services->load('App\\Ticket\\MessageHandler\\', '../../../src/Application/Ticket/MessageHandler');

    $services->set(SpyOnTicketReservation::class)
        ->args([service('app.spy.ticket_reserved')])
    ;
};
