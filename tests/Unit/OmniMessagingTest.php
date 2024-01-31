<?php

use Ibrahemkamal\OmniMessaging\Facades\OmniMessaging;
use Ibrahemkamal\OmniMessaging\Tests\Unit\Common\Mocks\AbstractMessagingDriverTestMock;

test('it throws exception if no channel is set', function () {
    OmniMessaging::send('Hello World', '11111111', 'sender-name');
})->throws(InvalidArgumentException::class, 'No Omni Messaging driver was specified.');

test('it throws exception if channel doesn`t exist in configuration file', function () {
    OmniMessaging::extend('test-driver', function () {
        return new AbstractMessagingDriverTestMock();
    });
    OmniMessaging::driver('test-driver')->send('Hello World', '11111111', 'sender-name');
})->throws(InvalidArgumentException::class, 'Omni Messaging channel [test-channel] is not defined.');

test('it throws exception if channel driver do not exist in config', function () {
    OmniMessaging::extend('test-driver', function () {
        return new AbstractMessagingDriverTestMock();
    });
    config()->set('omni-messaging.channels', [
        'test-channel' => [
            'options' => [],
        ],
    ]);
    OmniMessaging::driver('test-driver')->send('Hello World', '11111111', 'sender-name');

})->throws(InvalidArgumentException::class, 'Omni Messaging channel [test-channel] driver is not defined.');

test('it throws exception if channel options key do not exist in config', function () {
    OmniMessaging::extend('test-driver', function () {
        return new AbstractMessagingDriverTestMock();
    });
    config()->set('omni-messaging.channels.test-channel', ['driver' => 'test-driver']);
    OmniMessaging::driver('test-driver')->send('Hello World', '11111111', 'sender-name');
})->throws(InvalidArgumentException::class, 'Omni Messaging channel [test-channel] options is not defined.');

test('it returns channel driver if config is correct and driver exists', function () {
    config()->set('omni-messaging.channels.test-channel', ['driver' => 'test-driver', 'options' => []]);
    OmniMessaging::extend('test-driver', function () {
        return new AbstractMessagingDriverTestMock();
    });
    expect(OmniMessaging::driver('test-driver'))->toBeInstanceOf(AbstractMessagingDriverTestMock::class);
});
