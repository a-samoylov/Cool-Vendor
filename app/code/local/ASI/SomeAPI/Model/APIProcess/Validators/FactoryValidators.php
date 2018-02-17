<?php
namespace SomeAPI\conrollers\APIProcess\Validators;

class FactoryValidators {
    private $namespace_validator = 'SomeAPI\conrollers\APIProcess\Validators\\';

    public function __construct() {

    }

    public function Create($validators_names) {

        $validators = [];
        foreach ($validators_names as $key => $validators_name) {
            require_once $validators_name . '.php';
            $validators_name = $this->namespace_validator . $validators_name;
            $validators[] = new $validators_name();
        }

        return $validators;
    }
}