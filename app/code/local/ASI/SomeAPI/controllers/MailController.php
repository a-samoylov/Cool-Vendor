<?php
define('ROOT', Mage::getBaseDir() . '\app\code\local\ASI\SomeAPI\Model');
require_once ROOT . '\Mail\MailServer.php';

use SomeAPI\Model\Mail\MailServer;

class ASI_SomeAPI_MailController extends Mage_Core_Controller_Front_Action {
    public function indexAction() {
        $mailServer = new MailServer(Mage);
        $mailServer->sendEmail(
            Mage,
            Mage::getStoreConfig('someapi/settings/name'),
            Mage::getStoreConfig('someapi/settings/description')
        );
    }
}