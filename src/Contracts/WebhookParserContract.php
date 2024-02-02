<?php

namespace Ibrahemkamal\OmniMessaging\Contracts;

interface WebhookParserContract
{
    public function parsePayload(array $payload): WebhookParserContract;

    /*
     * @return  Ibrahemkamal\OmniMessaging\Contracts\SmsNumberContract[]
     */
    public function getParsedNumbers(): array;

}
