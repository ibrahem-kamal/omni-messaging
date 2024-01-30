<?php

namespace Ibrahemkamal\OmniMessaging;

use Ibrahemkamal\OmniMessaging\Contracts\MessagingDriverContract;
use Illuminate\Support\Manager;
use InvalidArgumentException;

class OmniMessaging extends Manager
{
    /**
     * Get the default driver name.
     *
     *
     * @throws InvalidArgumentException
     */
    public function getDefaultDriver(): string
    {
        throw new InvalidArgumentException('No Omni Messaging driver was specified.');
    }

    protected function channel(MessagingDriverContract $channel)
    {
        $name = $channel->getChannelName();
        $channel = config("omni-messaging.channels.$name");
        if (! $channel) {
            throw new InvalidArgumentException("Omni Messaging channel [$name] is not defined.");
        }
        if (! isset($channel['driver'])) {
            throw new InvalidArgumentException("Omni Messaging channel [$name] driver is not defined.");
        }
        if (! isset($channel['options'])) {
            throw new InvalidArgumentException("Omni Messaging channel [$name] options is not defined.");
        }

        return $this->driver($channel['driver']);
    }
}
