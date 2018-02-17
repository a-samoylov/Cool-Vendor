<?php
namespace SomeAPI\conrollers\APIProcess\Handlers;

require_once 'HandlerInterface.php';

class GetProductsHandler implements HandlerInterface {

    public function __construct() {

    }

    public function Run($Mage, $params) {
        $products = $Mage::getModel('catalog/product')->getCollection()->getData();
        rsort($products);//TODO optimizette

        return array_slice(
            $products,
            0 ,
            $params->limit
        );
    }
}