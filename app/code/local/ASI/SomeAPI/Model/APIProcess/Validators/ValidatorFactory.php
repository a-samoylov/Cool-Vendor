<?php
namespace SomeAPI\Model\APIProcess\Validators;

class ValidatorFactory {
    private $namespace_validator = 'SomeAPI\Model\APIProcess\Validators\\';

    public function __construct() {

    }

    public function create($validator_name) {
        require_once $validator_name . '.php';
        $validator_class_name = $this->namespace_validator . $validator_name;
        return new $validator_class_name();
    }
}