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

    public function driver($driver = null)
    {
        $driver = $driver ?: $this->getDefaultDriver();

        // If the given driver has not been created before, we will create the instances
        // here and cache it so we can return it next time very quickly. If there is
        // already a driver created by this name, we'll just return that instance.
        if (!isset($this->drivers[$driver])) {
            $this->drivers[$driver] = $this->createDriver($driver);
        }

        $this->validateDriver($this->drivers[$driver]);

        return $this->drivers[$driver];
    }

    private function validateDriver(MessagingDriverContract $channel): void
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
    }
}
