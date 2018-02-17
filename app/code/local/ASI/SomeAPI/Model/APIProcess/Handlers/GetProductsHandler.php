<?php
namespace SomeAPI\conrollers\APIProcess\Handlers;

require_once 'HandlerInterface.php';

class GetProductsHandler implements HandlerInterface {

    public function __construct() {

    }

    public function Run($Mage, $params) {
        $products = $Mage::getModel('catalog/product')->getCollection()
            ->setPage(0, $params->limit)
            ->setOrder('entity_id', 'desc');

        return $products->getData();
    }
}