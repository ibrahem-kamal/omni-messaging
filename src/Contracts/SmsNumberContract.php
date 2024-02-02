<?php

namespace Ibrahemkamal\OmniMessaging\Contracts;

use Illuminate\Contracts\Support\Arrayable;

interface SmsNumberContract extends Arrayable
{
    public function getNumber(): string;

    public function getFrom(): string;

    public function getReference(): string;

    public function getError(): string;

    public function isSuccess(): bool;

    public function setNumber(string $number): SmsNumberContract;

    public function setFrom(string $from): SmsNumberContract;

    public function setReference(string $reference): SmsNumberContract;

    public function setIsSuccess(bool $isSuccess): SmsNumberContract;

    public function setError(string $error): SmsNumberContract;
}
