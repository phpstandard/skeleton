<?php

use Framework\Providers as FrameworkProviders;
use Providers\RoutingServiceProvider;

return [
    // Load framework service providers
    FrameworkProviders\ViewServiceProvider::class,
    FrameworkProviders\RoutingServiceProvider::class,
    FrameworkProviders\HttpFactoryServiceProvider::class,

    // Load pplication service providers
    RoutingServiceProvider::class
];
