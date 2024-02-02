<?php

namespace Ibrahemkamal\OmniMessaging\Common\Parsers\Resources;

use Ibrahemkamal\OmniMessaging\Contracts\SmsNumberContract;

class SmsNumber implements SmsNumberContract
{
    private string $number = '';
    private string $from = '';
    private string $reference = '';
    private bool $isSuccess = false;
    private string $error = '';

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): SmsNumberContract
    {
        $this->number = $number;
        return $this;
    }

    public function getFrom(): string
    {
        return $this->from;
    }

    public function setFrom(string $from): SmsNumberContract
    {
        $this->from = $from;
        return $this;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function setReference(string $reference): SmsNumberContract
    {
        $this->reference = $reference;
        return $this;
    }

    public function isSuccess(): bool
    {
        return $this->isSuccess;
    }

    public function setIsSuccess(bool $isSuccess): SmsNumberContract
    {
        $this->isSuccess = $isSuccess;
        return $this;
    }

    public function getError(): string
    {
        return $this->error;
    }

    public function setError(string $error): SmsNumberContract
    {
        $this->error = $error;
        return $this;
    }

    public function toArray()
    {
        return [
            'number' => $this->getNumber(),
            'from' => $this->getFrom(),
            'reference' => $this->getReference(),
            'isSuccess' => $this->isSuccess(),
            'error' => $this->getError()
        ];
    }
}
