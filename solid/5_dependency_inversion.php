<?php

class SMTPMailer
{
    public function send()
    {
        return 'Send mail with SMTPMailer';
    }
}

class SendWelcomeMessage
{
    private $smtpMailer;

    public function __construct(SmtpMailer $smtpMailer)
    {
        $this->smtpMailer = $smtpMailer;
    }
}
