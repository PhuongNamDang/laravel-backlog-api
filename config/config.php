<?php

return [
    'space'  => env('BACKLOG_SPACE', ''),

    'secret' => env('BACKLOG_SECRET', ''),

    'domain' => env('BACKLOG_DOMAIN', ''),

    'providers' => [
        Itigoppo\BacklogApi\Providers\LaravelServiceProvider::class,
    ],
    'aliases' => [
        'BacklogApi' => Itigoppo\BacklogApi\Facades\Backlog::class,
    ]
];
