<?php
namespace SomeAPI\conrollers\Mail;


class MailServer {
    private $email;

    public function __construct($Mage) {
        $this->email = $Mage::getConfig()->getNode('email')->asArray();
    }

    public function SendEmail($Mage, $name, $description) {
        $text = "Name '$name' Description '$description'";

        $mail = $Mage::getModel('core/email');
        $mail->setToEmail($this->email);
        $mail->setBody($text);
        $mail->setType('html');

        try {
            $mail->send();
            Mage::getSingleton('core/session')->addSuccess('Your request has been sent');
            $this->_redirect('');
        }
        catch (Exception $e) {
            Mage::getSingleton('core/session')->addError('Unable to send.');
            $this->_redirect('');
        }
    }
}