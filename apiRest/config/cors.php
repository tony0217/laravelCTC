<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */

    'supportsCredentials' => false,
    'allowedOrigins' => ['*','GET', 'POST', 'PUT', 'DELETE'],
    'allowedOriginsPatterns' => ['Content-Type', 'X-Requested-With'],
    'allowedHeaders' => ['*','GET', 'POST', 'PUT', 'DELETE'],
    'allowedMethods' => ['*','GET', 'POST', 'PUT', 'DELETE'],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
