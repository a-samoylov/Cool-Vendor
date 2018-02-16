<?php
namespace SomeAPI\conrollers\APIProcess\Handlers;

class FactoryHandler {
    private $namespace_handler = 'SomeAPI\conrollers\APIProcess\Handlers\\';

    public function __construct() {

    }

    public function Create($handler_name) {
        require_once $handler_name . '.php';
        $handler_name = $this->namespace_handler . $handler_name;
        return new $handler_name();
    }
}