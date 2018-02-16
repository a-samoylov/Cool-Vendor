<?php
namespace SomeAPI\conrollers\APIProcess\Handlers;

require_once 'HandlerInterface.php';

class GetProductsHandler implements HandlerInterface {

    public function __construct() {

    }

    public function Run($params)
    {
        echo 'hi';
        // TODO: Implement Run() method.
    }
}