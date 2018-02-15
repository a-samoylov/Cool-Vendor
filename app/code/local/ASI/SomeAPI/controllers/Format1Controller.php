<?php

require_once Mage::getBaseDir() . '\app\code\local\ASI\SomeAPI\controllers\Auth\Auth.php';
require_once Mage::getBaseDir() . '\app\code\local\ASI\SomeAPI\controllers\Package\Package.php';
require_once Mage::getBaseDir() . '\app\code\local\ASI\SomeAPI\controllers\APIProcess\APIProcess.php';

class ASI_SomeAPI_Format1Controller extends Mage_Core_Controller_Front_Action {

    public function indexAction()
    {
        //http://127.0.0.1/magento/someapi/format1?params={"limit":"100"}&command=GetProducts&version=1
        $input_params = $this->getRequest()->getParams();
        $package = new SomeAPI\conrollers\Package\Package(
            $this->getRequest()->getHeader('someapi_bearer_token'),
            $input_params['version'],
            $input_params['command'],
            json_decode($input_params['params'])
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

        $apiProcess = new SomeAPI\conrollers\APIProcess\APIProcess(
            $package->get('version'),
            $package->get('command'),
            $package->get('params')
        );

        $response = $apiProcess->StartProcessing();
        if(is_array($response)) {
            echo json_encode($response);
        } else {
            //TODO
            //error
        }



        //Mage::register('someapi_block', Mage::getModel('someapi_block')->load(1));
        //$blocks = Mage::getModel('someapi/block')->getCollection();
    }
}