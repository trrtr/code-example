<?php

use App\Actor\MessageHandler\SpyOnActorReservation;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return function (ContainerConfigurator $configurator) {
    $services = $configurator->services()->defaults()
        ->autowire()
        ->autoconfigure()
    ;

    $services->load('App\\Actor\\MessageHandler\\', '../../../src/Application/Actor/MessageHandler');

    $services->set(SpyOnActorReservation::class)
        ->args([service('app.spy.actor_reserved')])
    ;
};
