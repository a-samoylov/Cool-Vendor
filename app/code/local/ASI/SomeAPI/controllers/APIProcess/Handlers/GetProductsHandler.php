<?php
namespace SomeAPI\conrollers\APIProcess\Handlers;

require_once 'HandlerInterface.php';

class GetProductsHandler implements HandlerInterface {

    public function __construct() {

    }

    public function Run($Mage, $params)    {
        return array_slice(
            $Mage::getModel('catalog/product')->getCollection()->getData(),
            0 ,
            $params->limit
        );
    }
}