<?php

namespace Ibrahemkamal\OmniMessaging\Tests\Unit\Common\Mock;

use Ibrahemkamal\OmniMessaging\Common\AbstractMessagingDriver;
use Ibrahemkamal\OmniMessaging\Concerns\MessagingDriverResponse;
use Ibrahemkamal\OmniMessaging\Contracts\WebhookParserContract;

class AbstractMessagingDriverTestMock extends AbstractMessagingDriver
{
    public function send(string $message, string $mobileNumber, string $sender, array $options = []): MessagingDriverResponse
    {
        return $this->messagingDriverResponse;
    }

    public function sendBulk(string $message, array $mobileNumbers, string $sender, array $options = []): MessagingDriverResponse
    {
        return $this->messagingDriverResponse;
    }

    public function getBalance(string $sender = '', array $options = []): MessagingDriverResponse
    {
        return $this->messagingDriverResponse;
    }

    public function getChannelName(): string
    {
        return 'test-channel';
    }

    public function getWebhookParser(): WebhookParserContract
    {
        return new AbstractWebhookParseTestMock();
    }
}
