<?php

use Ibrahemkamal\OmniMessaging\Concerns\MessagingDriverResponse;
use Ibrahemkamal\OmniMessaging\Tests\Unit\Common\Mocks\AbstractMessagingDriverTestMock;

test('it implements messaging driver contract', function () {
    $mock = mock('Ibrahemkamal\OmniMessaging\Common\AbstractMessagingDriver');
    expect($mock)->toBeInstanceOf(\Ibrahemkamal\OmniMessaging\Contracts\MessagingDriverContract::class);
});
test('it is an abstract class', function () {
    expect('Ibrahemkamal\OmniMessaging\Common\AbstractMessagingDriver')->toBeAbstract();
});

test('it can get config option array', function () {
    $method = new ReflectionMethod('Ibrahemkamal\OmniMessaging\Tests\Unit\Common\Mocks\AbstractMessagingDriverTestMock', 'getConfigOption');
    $method->setAccessible(true);
    $service = new AbstractMessagingDriverTestMock();
    config()->set('omni-messaging.channels.test-channel.options', ['foo' => 'bar']);
    expect($method->invoke($service))->toBeArray()->toBe(['foo' => 'bar']);
});
test('it can get config option for a specific option key', function () {
    $method = new ReflectionMethod('Ibrahemkamal\OmniMessaging\Tests\Unit\Common\Mocks\AbstractMessagingDriverTestMock', 'getConfigOption');
    $method->setAccessible(true);
    $service = new AbstractMessagingDriverTestMock();
    config()->set('omni-messaging.channels.test-channel.options', ['foo' => 'bar']);
    expect($method->invoke($service, 'foo'))->toBe('bar');
});
test('it returns MessagingDriverResponse from send method', function () {
    $service = new AbstractMessagingDriverTestMock();
    $response = $service->send('Hello World', '11111111', 'sender-name');
    expect($response)->toBeInstanceOf(MessagingDriverResponse::class);
});
test('it returns MessagingDriverResponse from sendBulk method', function () {
    $service = new AbstractMessagingDriverTestMock();
    $response = $service->sendBulk('Hello World', ['11111111', '22222222'], 'sender-name');
    expect($response)->toBeInstanceOf(MessagingDriverResponse::class);
});
test('it returns MessagingDriverResponse from getBalance method', function () {
    $service = new AbstractMessagingDriverTestMock();
    $response = $service->getBalance();
    expect($response)->toBeInstanceOf(MessagingDriverResponse::class);
});
test('it returns channel name from getChannelName method', function () {
    $service = new AbstractMessagingDriverTestMock();
    expect($service->getChannelName())->toBe('test-channel');
});
