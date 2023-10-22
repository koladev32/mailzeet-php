<?php

namespace MailZeet\Objects;

use MailZeet\Exceptions\InvalidPayloadException;

class Recipient
{
    protected string $name;

    protected string $email;

    public function __construct(string $email, string $name = '')
    {
        $this->setEmail($email);
        $this->setName($name);
    }

    private function setName(?string $name): void
    {
        $this->name = $name;
    }

    private function setEmail(string $email): void
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidPayloadException('Email is not valid.');
        }

        $this->email = $email;
    }

    public function toArray(): array
    {
        return [
            'name'  => $this->name,
            'email' => $this->email,
        ];
    }
}
