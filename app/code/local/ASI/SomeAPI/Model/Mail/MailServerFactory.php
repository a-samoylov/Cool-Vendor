<?php

namespace SomeAPI\Model\Mail;

require_once 'MailServer.php';

class MailServerFactory
{

    public function __construct()
    {
    }

    public function create($name, $description)
    {
        if ($name == '') {
            throw new \Exception('Invalid name');
        }
        if ($description == '') {
            throw new \Exception('Invalid description');
        }

        return new MailServer(
            $this->email = \Mage::getConfig()->getNode('email')->asArray(),
            $name,
            $description
        );
    }
}
