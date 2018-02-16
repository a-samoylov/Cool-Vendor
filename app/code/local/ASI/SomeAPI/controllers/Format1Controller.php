<?php

define('ROOT', Mage::getBaseDir() . '\app\code\local\ASI\SomeAPI\controllers');
require_once ROOT . '\Auth\Auth.php';
require_once ROOT . '\Package\Package.php';
require_once ROOT . '\APIProcess\APIProcess.php';
require_once ROOT . '\Definition\APIConfig.php';

use \SomeAPI\conrollers\APIProcess\APIProcess;
use \SomeAPI\conrollers\Auth\Auth;
use \SomeAPI\conrollers\Package\Package;

class ASI_SomeAPI_Format1Controller extends Mage_Core_Controller_Front_Action {
    public function indexAction()
    {
        //http://127.0.0.1/magento/someapi/format1?params={"limit":"100"}&command=GetProducts&version=1.0
        $input_params = $this->getRequest()->getParams();
        $package = new Package(
            $this->getRequest()->getHeader('someapi_bearer_token'),
            $input_params['version'],
            $input_params['command'],
            json_decode($input_params['params'])
        );

        if(!$package->IsFullPackage()) {
            //TODO
            //error package not full
        }

        $auth = new Auth($package->get('bearer_token'));
        if(!$auth->IsUserAuthorized()) {
            //TODO
            //error
        }

        $apiProcess = new APIProcess(
            Mage,
            $package->get('version'),
            $package->get('command'),
            $package->get('params')
        );

        $response = $apiProcess->StartProcessing();
        if(is_array($response)) {
            echo json_encode($response);
        } else {
            //TODO
            //error not found command or invalid params
        }
    }
}