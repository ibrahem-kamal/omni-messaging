<?php

use Ibrahemkamal\OmniMessaging\Contracts\SmsNumberContract;

test('it implements SmsNumberContract', function () {
    $mock = mock('Ibrahemkamal\OmniMessaging\Common\Parsers\Resources\SmsNumber');
    expect($mock)->toBeInstanceOf(SmsNumberContract::class);
});

test('it can set and get number', function () {
    $smsNumber = new \Ibrahemkamal\OmniMessaging\Common\Parsers\Resources\SmsNumber();
    $smsNumber->setNumber('123456789');
    expect($smsNumber->getNumber())->toBe('123456789');
});

test('it can set and get reference', function () {
    $smsNumber = new \Ibrahemkamal\OmniMessaging\Common\Parsers\Resources\SmsNumber();
    $smsNumber->setReference('123456789');
    expect($smsNumber->getReference())->toBe('123456789');
});

test('it can set and get from', function () {
    $smsNumber = new \Ibrahemkamal\OmniMessaging\Common\Parsers\Resources\SmsNumber();
    $smsNumber->setFrom('sender-name');
    expect($smsNumber->getFrom())->toBe('sender-name');
});

test('it can set and get is success', function () {
    $smsNumber = new \Ibrahemkamal\OmniMessaging\Common\Parsers\Resources\SmsNumber();
    $smsNumber->setIsSuccess(true);
    expect($smsNumber->isSuccess())->toBeTrue();
});

test('it can set and get error', function () {
    $smsNumber = new \Ibrahemkamal\OmniMessaging\Common\Parsers\Resources\SmsNumber();
    $smsNumber->setError('error');
    expect($smsNumber->getError())->toBe('error');
});

test('it can convert to array', function () {
    $smsNumber = new \Ibrahemkamal\OmniMessaging\Common\Parsers\Resources\SmsNumber();
    $smsNumber->setNumber('123456789')
        ->setReference('123456789')
        ->setFrom('sender-name')
        ->setIsSuccess(true)
        ->setError('error');
    expect($smsNumber->toArray())->toBe([
        'number' => '123456789',
        'from' => 'sender-name',
        'reference' => '123456789',
        'isSuccess' => true,
        'error' => 'error',
    ]);
});
