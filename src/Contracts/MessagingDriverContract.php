<?php

namespace Ibrahemkamal\OmniMessaging\Contracts;

use Ibrahemkamal\OmniMessaging\Concerns\MessagingDriverResponse;

interface MessagingDriverContract
{
    public function send(string $message, string $mobileNumber, string $sender, array $options = []): MessagingDriverResponse;

    public function sendBulk(string $message, array $mobileNumbers, string $sender, array $options = []): MessagingDriverResponse;

    public function getBalance(string $sender = '', array $options = []): MessagingDriverResponse;

    public function getChannelName(): string;

    public function getWebhookParser(): WebhookParserContract;
}
