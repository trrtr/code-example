<?php

use Domain\Ticket\Executor\Executor;
use Domain\Ticket\Executor\RandomlyFailingExecutor;
use Domain\Ticket\Executor\UselessExecutor;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return function (ContainerConfigurator $configurator) {
    $services = $configurator->services()->defaults()
        ->autowire()
        ->autoconfigure()
    ;

    $services->set(UselessExecutor::class);
    $services->set('app.default_executor')
        ->class(RandomlyFailingExecutor::class)
        ->args([service(UselessExecutor::class)])
    ;

    $services->alias(Executor::class, 'app.default_executor');
};
