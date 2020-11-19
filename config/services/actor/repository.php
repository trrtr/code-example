<?php

use App\Actor\Repository\UselessActors;
use Domain\Actor\Actors;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return function (ContainerConfigurator $configurator) {
    $services = $configurator->services()->defaults()
        ->autowire()
        ->autoconfigure()
    ;

    $services->load('App\\Actor\\Repository\\', '../../../src/Application/Actor/Repository');

    $services->alias(Actors::class, UselessActors::class);
};
