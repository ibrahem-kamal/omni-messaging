<?php

use Ibrahemkamal\OmniMessaging\Common\Parsers\Resources\SmsNumber;

test('it implements WebhookParserContract', function () {
    $mock = mock('Ibrahemkamal\OmniMessaging\Common\Parsers\AbstractWebhookParse');
    expect($mock)->toBeInstanceOf(\Ibrahemkamal\OmniMessaging\Contracts\WebhookParserContract::class);
});

test('it can add parsed number', function () {
    $service = new \Ibrahemkamal\OmniMessaging\Tests\Unit\Common\Mock\AbstractWebhookParseTestMock();
    $service->addParsedNumber(new SmsNumber());
    expect($service->getParsedNumbers())->toBeArray()->toHaveCount(1);
});
