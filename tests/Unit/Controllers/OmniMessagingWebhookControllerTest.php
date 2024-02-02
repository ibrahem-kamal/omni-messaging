<?php

use Ibrahemkamal\OmniMessaging\Events\OmniMessagingWebhookUpdateEvent;
use Ibrahemkamal\OmniMessaging\Facades\OmniMessaging;
use Ibrahemkamal\OmniMessaging\Tests\Unit\Common\Mock\AbstractMessagingDriverTestMock;
use Illuminate\Support\Facades\Event;
use function Pest\Laravel\post;

test('it dispatch OmniMessagingWebhookUpdateEvent after parsing payload', function () {
    Event::fake();
    $payload = json_decode(file_get_contents(__DIR__ . '/Mock/Payloads/SmsWebhookPayload.json'), true);
    OmniMessaging::extend('test-driver', function () {
        return new AbstractMessagingDriverTestMock();
    });
    config()->set('omni-messaging.channels.test-channel', ['driver' => 'test-driver', 'options' => []]);
    $response = post(route('omni-messaging-webhook', ['driver' => 'test-driver']), $payload);
    $response->assertStatus(200);
    Event::assertDispatched(OmniMessagingWebhookUpdateEvent::class);
});
