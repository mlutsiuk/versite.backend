<?php

namespace App\Containers\AppSection\Authentication\Providers;

use App\Ship\Parents\Providers\EventServiceProvider as ParentEventServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

class EventServiceProvider extends ParentEventServiceProvider {

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];
}
