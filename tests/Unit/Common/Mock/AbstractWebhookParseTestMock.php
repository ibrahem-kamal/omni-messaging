<?php

namespace Ibrahemkamal\OmniMessaging\Tests\Unit\Common\Mock;

use Ibrahemkamal\OmniMessaging\Common\Parsers\AbstractWebhookParse;
use Ibrahemkamal\OmniMessaging\Common\Parsers\Resources\SmsNumber;
use Ibrahemkamal\OmniMessaging\Contracts\WebhookParserContract;

class AbstractWebhookParseTestMock extends AbstractWebhookParse
{
    public function parsePayload(array $payload): WebhookParserContract
    {
        foreach ($payload as $number) {
            $parsedNumber = new SmsNumber();
            $parsedNumber->setNumber($number['number'])
                ->setReference($number['msg_id'])
                ->setFrom($number['sender'])
                ->setIsSuccess($number['status'] == 'success')
                ->setError($number['error_code_string']);
            $this->addParsedNumber($parsedNumber);
        }

        return $this;
    }
}
