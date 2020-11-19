<?php

use App\Spy\InMemorySpy;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return function (ContainerConfigurator $configurator) {
    $services = $configurator->services()->defaults()
        ->autowire()
        ->autoconfigure()
    ;

    $services->set('app.spy.ticket_reserved')
        ->class(InMemorySpy::class)
    ;

    $services->set('app.spy.actor_reserved')
        ->class(InMemorySpy::class)
    ;
};
