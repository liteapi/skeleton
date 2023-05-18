<?php

use LiteApi\Component\Logger\MonologExtension;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

$projectDir = realpath(__DIR__ . '/../');

return [
    'projectDir' => $projectDir,
    'trustedIPs' => [],
    'services' => $projectDir . '/src',
    'container' => [
    ],
    'extensions' => [
        MonologExtension::class => [
            'kernel.logger' => [
                'handlers' => [
                    'class' => StreamHandler::class,
                    'args' => [$projectDir . '/var/log.app.log', Level::Debug]
                ]
            ]
        ]
    ],
    'cache' => [
        'class' => FilesystemAdapter::class,
        'args' => [
            'kernel', 0, $projectDir . '/var/cache'
        ]
    ]
];