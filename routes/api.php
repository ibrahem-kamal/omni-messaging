<?php

use Ibrahemkamal\OmniMessaging\Http\Controllers\OmniMessagingWebhookController;
use Illuminate\Support\Facades\Route;

Route::post('/api/v1/omni-messaging-webhook/{driver}', OmniMessagingWebhookController::class)
    ->name('omni-messaging-webhook');
