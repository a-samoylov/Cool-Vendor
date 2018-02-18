<?php
namespace SomeAPI\Model\APIProcess\Handlers;

class HandlerFactory {
    private $namespace_handler = 'SomeAPI\Model\APIProcess\Handlers\\';

    public function __construct() {

    }

    public function create($handler_name) {
        require_once $handler_name . '.php';
        $handler_class_name = $this->namespace_handler . $handler_name;
        return new $handler_class_name();
    }
}