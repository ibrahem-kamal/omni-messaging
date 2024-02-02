<?php

namespace Ibrahemkamal\OmniMessaging\Common\Parsers;

use Ibrahemkamal\OmniMessaging\Contracts\SmsNumberContract;
use Ibrahemkamal\OmniMessaging\Contracts\WebhookParserContract;

abstract class AbstractWebhookParse implements WebhookParserContract
{
    private array $parsedNumbers = [];

    public function addParsedNumber(SmsNumberContract $number)
    {
        $this->parsedNumbers[] = $number;
    }

    public function getParsedNumbers(): array
    {
        return $this->parsedNumbers;
    }
}
