<?php
namespace SomeAPI\conrollers\APIProcess\Handlers;

require_once 'GetProductsHandler.php';

class FactoryHandler {
    public function __construct() {

    }

    public function Create($handler_names) {
        return new $handler_names();
    }
}