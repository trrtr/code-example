<?php

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $container) {
    $container->extension('framework', [
        'messenger' => [
            'default_bus' => 'command_bus',
            'buses' => [
                'command_bus' => [],
                'event_bus' => [
                    'default_middleware' => 'allow_no_handlers',
                ],
                'query_bus' => [],
            ],
            'transports' => [
                # https://symfony.com/doc/current/messenger.html#transport-configuration
                'job_executions' => [
                    'dsn' => 'sync://',
                ],
            ],
        ],
    ]);
};
