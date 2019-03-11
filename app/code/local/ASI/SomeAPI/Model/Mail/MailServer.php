<?php

namespace SomeAPI\Model\Mail;

class MailServer
{
    private $email;
    private $name;
    private $description;

    public function __construct($email, $name, $description)
    {
        $this->email       = $email;
        $this->name        = $name;
        $this->description = $description;
    }

    public function sendEmail()
    {
        $text = "Name '$this->name' Description '$this->description'";

        $mail = \Mage::getModel('core/email');
        $mail->setToEmail($this->email);
        $mail->setBody($text);
        $mail->setType('html');

        try {
            $mail->send();
        } catch (Exception $e) {
            throw new \Exception('Error mail don\'t send');
        }
    }
}
