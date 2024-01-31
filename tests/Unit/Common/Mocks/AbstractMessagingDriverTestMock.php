<?php

namespace Ibrahemkamal\OmniMessaging\Tests\Unit\Common\Mocks;

use Ibrahemkamal\OmniMessaging\Common\AbstractMessagingDriver;
use Ibrahemkamal\OmniMessaging\Concerns\MessagingDriverResponse;

class AbstractMessagingDriverTestMock extends AbstractMessagingDriver
{
    public function send(string $message, string $mobileNumber, string $senderName, array $options = []): MessagingDriverResponse
    {
        return $this->messagingDriverResponse;
    }

    public function sendBulk(string $message, array $mobileNumbers, string $senderName, array $options = []): MessagingDriverResponse
    {
        return $this->messagingDriverResponse;
    }

    public function getBalance(array $options = []): MessagingDriverResponse
    {
        return $this->messagingDriverResponse;
    }

    public function getChannelName(): string
    {
        return 'test-channel';
    }
}
