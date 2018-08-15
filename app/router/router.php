<?php

$routeConfigs = [
    [
        'type' => 'rewrite',
        'match' => '/api',
        'route' => [
            'controller' => 'api',
            'action' => 'index',
            'method' => 'post',
        ],
    ],
    [
        'type' => 'rewrite',
        'match' => '/api/jsonp',
        'route' => [
            'controller' => 'api',
            'action' => 'jsonp',
            'method' => 'get',
        ],
    ],
];
