<?php

namespace Ibrahemkamal\OmniMessaging\Http\Controllers;

use Ibrahemkamal\OmniMessaging\Events\OmniMessagingWebhookUpdateEvent;
use Ibrahemkamal\OmniMessaging\Facades\OmniMessaging;
use Illuminate\Http\Request;

class OmniMessagingWebhookController
{
    public function __invoke(string $driver, Request $request)
    {
        $parser = OmniMessaging::driver($driver)
            ->getWebhookParser();
        $parser->parsePayload($request->all());
        OmniMessagingWebhookUpdateEvent::dispatch($parser->getParsedNumbers());

        return response()->json(['status' => 'ok']);
    }
}
