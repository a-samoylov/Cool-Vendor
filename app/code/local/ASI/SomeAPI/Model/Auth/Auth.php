<?php
namespace SomeAPI\Model\Auth;

class Auth {
    private $bearer_token;
    private $Mage ;

    public function __construct($Mage, $bearer_token) {
        $this->bearer_token = $bearer_token;
        $this->Mage = $Mage;
    }

    public function IsUserAuthorized() {
        $tokens = ($this->Mage)::getModel('someapi/bearertokens')->getCollection()->getData();
        foreach ($tokens as $key => $token) {
            if($token['value'] == $this->bearer_token) {
                return true;
            }
        }
        return false;
    }
}