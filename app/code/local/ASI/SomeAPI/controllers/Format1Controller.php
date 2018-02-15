<?php

require_once Mage::getBaseDir() . '\app\code\local\ASI\SomeAPI\controllers\Auth\Auth.php';
require_once Mage::getBaseDir() . '\app\code\local\ASI\SomeAPI\controllers\Package\Package.php';

class ASI_SomeAPI_Format1Controller extends Mage_Core_Controller_Front_Action {

    public function indexAction()
    {
        /*$package = new SomeAPI\conrollers\Package\Package(
            $this->getRequest()->getHeader('someapi_bearer_token'),
            $this->getRequest()->getParam('version'),
            $this->getRequest()->getParam('command'),
            $this->getRequest()->getParam('params')
        );*/

        $package = new SomeAPI\conrollers\Package\Package(
            "test",
            "1",
            "get_products",
            []
        );

        if(!$package->IsFullPackage()) {
            //TODO
            //error
        }

        $auth = new SomeAPI\conrollers\Auth\Auth($package->get('bearer_token'));
        if(!$auth->IsUserAuthorized()) {
            //TODO
            //error
        }
        //echo Mage::helper('someapi')->__('SomeAPI');

        //Mage::register('someapi_block', Mage::getModel('someapi_block')->load(1));
        //$blocks = Mage::getModel('someapi/block')->getCollection();
        //var_dump($blocks[0]);



        //var_dump($value = Mage::getConfig()->getNode('API'));
    }
}