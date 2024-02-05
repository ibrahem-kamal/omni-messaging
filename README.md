# Omni Messaging

___
**An easy to use, consistent sms library for Laravel**

[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ibrahem-kamal/omni-messaging/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ibrahem-kamal/omni-messaging/actions?query=workflow%3Arun-tests)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ibrahem-kamal/omni-messaging/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ibrahem-kamal/omni-messaging/actions?query=workflow%3A"Fix+PHP+code+style+issues")
[![Total Downloads](https://img.shields.io/packagist/dt/ibrahem-kamal/omni-messaging.svg?style=flat-square)](https://packagist.org/packages/ibrahem-kamal/omni-messaging)

Omni messaging is heavily inspired by the PHP OmniPay Library and is designed to be a simple and consistent interface
for sending SMS messages in Laravel.

there are many SMS gateways out there, and they all have their own API's, and they all have their own way of doing
things. Omni Messaging is designed to provide a consistent interface for sending SMS messages, regardless of the gateway
you are using.

Currently supported gateways are (Many more will be added in the future either by me or the community):

| Sms Gateway                            | 1.x | Composer Package | Maintainer                                        |
|----------------------------------------|-----|------------------|---------------------------------------------------|
| [Jawaly Sms](https://www.4jawaly.com/) | ✓   |                  | [Ibrahem Kamal](https://github.com/ibrahem-kamal) |

## Installation

You can install the package via composer:

```bash
composer require ibrahem-kamal/omni-messaging
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="omni-messaging-migrations"
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="omni-messaging-config"
```

This is the contents of the published config file:

```php
return [
    /**
     * Channels should be added in the following format:
     * 'channels' => [
     *     'channel_name' => [
     *        'driver' => 'driver_name',
     *       'options' => []
     *    ]
     * ]
     */
    'channels' => [],
    'webhook' => [
        'queue' => 'default',
    ],
];
```



## Usage

- Sending Sms
```php
$sms = OmniMessaging::driver('jawaly')->send($message,$mobileNumber,$sender,$options = []);
    $sms->isSuccess(); //bool
    $sms->getErrorsString(); // errors as string
    $sms->getErrors(); // errors as array
    $sms->getData(); // array of data returned from the gateway
    $sms->toArray(); // array of all the above
```

- Retrieving Balance

```php
$balance = OmniMessaging::driver('jawaly')->getBalance();
    $balance->isSuccess(); //bool
    $balance->getErrorsString(); // errors as string
    $balance->getErrors(); // errors as array
    $balance->getData(); // array of data returned from the gateway
    $balance->toArray(); // array of all the above
```

- Handling Sms Webhooks

> by default this package will handle the incoming sms webhooks using the gateway logic and dispatch an
> event `OmniMessagingWebhookUpdateEvent` with the `parsedWebhookData` as payload. so for example to listen to incoming
> sms you can do the following:

```php
// in your event service provider
     OmniMessagingWebhookUpdateEvent::class => [
            YourListener::class,
        ]
```

> and within your listener you can access the parsed data as follows:

```php
    public function handle(OmniMessagingWebhookUpdateEvent $event)
    {
          foreach ($event->parsedWebhookData as $parsedNumber) {
            $parsedNumber->getNumber(); // phone number string
            $parsedNumber->getFrom(); // sender string
            $parsedNumber->getReference(); // reference string such as message id
            $parsedNumber->isSuccess(); // bool
            $parsedNumber->getError(); // string
            $parsedNumber->toArray(); // array of all the above
        }
    }
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [ibrahemkamal](https://github.com/ibrahem-kamal)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
