<?php
namespace SomeAPI\conrollers\Auth;

class Auth {
    //private $bearer_token;
    private $isUserAuthorized = false;

    public function __construct($Mage, $bearer_token) {
        //$this->bearer_token = $bearer_token;

        if(!$bearer_token) {
            return;
        }

        $tokens = $Mage::getModel('someapi/block')->getCollection()->getData();
        foreach ($tokens as $key => $token) {
            if($token['value'] == $bearer_token) {
                $this->isUserAuthorized = true;
                break;
            }
        }
    }

    public function IsUserAuthorized() {
        return $this->isUserAuthorized;
    }
}