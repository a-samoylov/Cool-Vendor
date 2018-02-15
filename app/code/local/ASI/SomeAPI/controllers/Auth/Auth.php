<?php
namespace SomeAPI\conrollers\Auth;

require_once 'AuthInterface.php';

class Auth implements AuthInterface {
    private $bearer_token;

    public function __construct($bearer_token) {
        $this->bearer_token = $bearer_token;
    }

    public function IsUserAuthorized() {
        //TODO
        return true;
    }
}