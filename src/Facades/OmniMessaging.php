<?php

namespace Ibrahemkamal\OmniMessaging\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ibrahemkamal\OmniMessaging\OmniMessaging
 * @method static \Ibrahemkamal\OmniMessaging\Contracts\MessagingDriverContract driver(string $driverName)
 *
 */
class OmniMessaging extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Ibrahemkamal\OmniMessaging\OmniMessaging::class;
    }
}
