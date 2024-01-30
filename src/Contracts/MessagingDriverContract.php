<?php

namespace Ibrahemkamal\OmniMessaging\Contracts;

use Ibrahemkamal\OmniMessaging\Concerns\MessagingDriverResponse;

interface MessagingDriverContract
{
    public function send(string $message, string $mobileNumber, string $senderName, array $options = []): MessagingDriverResponse;

    public function sendBulk(string $message, array $mobileNumbers, string $senderName, array $options = []): MessagingDriverResponse;

    public function getBalance(array $options = []): MessagingDriverResponse;

    public function getChannelName(): string;

}
