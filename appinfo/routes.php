<?php
return [
    'routes' => [
        ['name' => 'page#index', 'url' => '/', 'verb' => 'GET'],
        ['name' => 'templates#index', 'url' => '/templates', 'verb' => 'GET'],
        ['name' => 'templates#create', 'url' => '/templates', 'verb' => 'POST'],

        ['name' => 'workflows#index', 'url' => '/workflows', 'verb' => 'GET'],
        ['name' => 'workflows#create', 'url' => '/workflows', 'verb' => 'POST'],
    ],
];
