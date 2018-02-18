<?php
namespace SomeAPI\Model\Auth;

class Auth {
    private $bearer_token;

    public function __construct($bearer_token) {
        $this->bearer_token = $bearer_token;
    }

    public function isUserAuthorized() {
        $tokens = \Mage::getModel('someapi/bearertokens')->getCollection()->getData();
        foreach ($tokens as $key => $token) {
            if($token['value'] == $this->bearer_token) {
                return true;
            }
        }
        return false;
    }
}