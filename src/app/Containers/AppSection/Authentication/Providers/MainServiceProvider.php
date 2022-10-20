<?php

namespace App\Containers\AppSection\Authentication\Providers;

use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;

/**
 * Class MainServiceProvider.
 *
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 *

 */
class MainServiceProvider extends ParentMainServiceProvider
{
    /**
     * Container Service Providers.
     */
    public array $serviceProviders = [
        MiddlewareServiceProvider::class
    ];

    /**
     * Container Aliases
     */
    public array $aliases = [

    ];
}
