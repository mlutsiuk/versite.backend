<?php

namespace App\Ship\Parents\Providers;

use Apiato\Core\Abstracts\Providers\RouteServiceProvider as AbstractRouteServiceProvider;

abstract class RouteServiceProvider extends AbstractRouteServiceProvider
{
    public function boot(): void
    {
        parent::boot();
    }
}
