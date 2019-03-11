<?php

define('ROOT', Mage::getBaseDir() . '\app\code\local\ASI\SomeAPI\Model');
require_once ROOT . '\Mail\MailServerFactory.php';

use SomeAPI\Model\Mail\MailServerFactory;

class ASI_SomeAPI_MailController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        try {
            $mailServer = (new MailServerFactory())
                ->create(
                    Mage::getStoreConfig('someapi/settings/name'),
                    Mage::getStoreConfig('someapi/settings/description')
                );
            $mailServer->sendEmail();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
