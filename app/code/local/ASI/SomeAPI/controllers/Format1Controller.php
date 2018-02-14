<?php

require_once Mage::getBaseDir() . '\app\code\local\ASI\SomeAPI\controllers\Package\Package.php';

class ASI_SomeAPI_Format1Controller extends Mage_Core_Controller_Front_Action {

    public function indexAction()
    {
        //var_dump($this->getRequest()->getParam('a'));
        //var_dump($this->getRequest()->getHeader('Accept'));
        $package = new SomeAPI\conrollers\Package\Package(
            "test",
            "1",
            "get_products",
            []
        );

        if(!$package->IsFullPackage()){
            //error
        }

        //var_dump($package);
        //var_dump($package->get('bearer_token'));
    }
}