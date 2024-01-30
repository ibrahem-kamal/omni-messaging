<?php

namespace Ibrahemkamal\OmniMessaging\Common;

use Ibrahemkamal\OmniMessaging\Concerns\MessagingDriverResponse;
use Ibrahemkamal\OmniMessaging\Contracts\MessagingDriverContract;

abstract class AbstractMessagingDriver implements MessagingDriverContract
{
    protected MessagingDriverResponse $messagingDriverResponse;

    public function __construct()
    {
        $this->messagingDriverResponse = new MessagingDriverResponse();
    }

    protected function getConfigOption(?string $key = null): mixed
    {
        if (is_null($key)) {
            return config("omni-messaging.channels.{$this->getChannelName()}.options");
        }
        return config("omni-messaging.channels.{$this->getChannelName()}.options.{$key}");
    }

}
