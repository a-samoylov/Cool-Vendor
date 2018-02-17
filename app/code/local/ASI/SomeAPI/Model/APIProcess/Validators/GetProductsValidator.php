<?php
namespace SomeAPI\Model\APIProcess\Validators;

require_once 'ValidatorInterface.php';

class GetProductsValidator implements ValidatorInterface {

    const LIMIT_MIN = 1;
    const LIMIT_MAX = 1000;

    public function __construct() {

    }

    public function Validate($params)
    {
        if(isset($params->limit) &&
            $params->limit >= GetProductsValidator::LIMIT_MIN &&
            $params->limit <= GetProductsValidator::LIMIT_MAX){

            return true;
        }

        return false;
    }
}