<?php
namespace SomeAPI\Model\Auth;

require_once 'Auth.php';

use \SomeAPI\Model\Auth\Auth;

class AuthFactory {
    private $bearer_token;

    public function __construct() {

    }

    public function create($bearer_token) {
        return new Auth($bearer_token);
    }
}