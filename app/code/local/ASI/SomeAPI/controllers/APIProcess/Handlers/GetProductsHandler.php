<?php
namespace SomeAPI\conrollers\APIProcess\Handlers;

require_once 'HandlerInterface.php';

class GetProductsHandler implements HandlerInterface {

    public function __construct() {

    }

    public function Run($params)
    {
        // TODO
        echo 'HI';
        return [];
    }
}