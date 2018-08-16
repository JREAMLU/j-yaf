<?php

$routeConfigs = [
    [
        'type' => 'rewrite',
        'match' => '/api',
        'route' => [
            'controller' => 'api',
            'action' => 'index',
        ],
    ],
    [
        'type' => 'rewrite',
        'match' => '/api/jsonp',
        'route' => [
            'controller' => 'api',
            'action' => 'jsonp',
        ],
    ],
];
