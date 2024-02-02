<?php

namespace Ibrahemkamal\OmniMessaging\Events;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;

class OmniMessagingWebhookUpdateEvent implements ShouldQueue
{
    use Dispatchable, Queueable;

    public array $parsedWebhookData;

    public function __construct(array $parsedWebhookData)
    {
        $this->onQueue(config('omni-messaging.webhook.queue'));
        $this->parsedWebhookData = $parsedWebhookData;
    }
}
