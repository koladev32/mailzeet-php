<?php

namespace MailZeet\Tests\Objets;

use MailZeet\Configs\Config;
use MailZeet\Exceptions\InvalidPayloadException;
use MailZeet\MailZeet;
use MailZeet\Objects\Recipient;
use MailZeet\Payment;
use MailZeet\Payout;
use PHPUnit\Framework\TestCase;

class RecipientTest extends TestCase
{
    /**
     * It should construct a MailZeet object.
     *
     * @test
     */
    public function it_should_properly_sets_recipient_params(): void
    {
        $recipient = (new Recipient('email@mailersend.com', 'Recipient'))->toArray();

        self::assertEquals('email@mailersend.com', $recipient['email']);
        self::assertEquals('Recipient', $recipient['name']);
    }

    /**
     * It should construct a MailZeet object.
     *
     * @test
     */
    public function it_should__recipient_validates_email(): void
    {
        $this->expectException(InvalidPayloadException::class);

        new Recipient(
            'fake-email',
            'Recipient'
        );
    }
}