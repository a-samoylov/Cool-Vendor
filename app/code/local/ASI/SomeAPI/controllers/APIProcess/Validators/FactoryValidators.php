<?php
namespace SomeAPI\conrollers\APIProcess\Validators;

require_once 'GetProductsValidator.php';

class FactoryValidators {

    public function __construct() {

    }

    public function Create($validators_names) {
        $validators = [];
        foreach ($validators_names as $key => $name) {
            $validators[] = new $name();
        }

        return $validators;
    }
}