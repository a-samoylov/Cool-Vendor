<?php

define('ROOT', Mage::getBaseDir() . '\app\code\local\ASI\SomeAPI\Model');
require_once ROOT . '\Auth\Auth.php';
require_once ROOT . '\Package\Package.php';
require_once ROOT . '\APIProcess\APIProcess.php';
require_once ROOT . '\Definition\APIConfig.php';
require_once ROOT . '\Exception\Exception.php';

use \SomeAPI\conrollers\APIProcess\APIProcess;
use \SomeAPI\conrollers\Auth\Auth;
use \SomeAPI\conrollers\Package\Package;
use \SomeAPI\conrollers\Exception\Exception;

class ASI_SomeAPI_Format1Controller extends Mage_Core_Controller_Front_Action {
    public function indexAction() {
        $input_params = $this->getRequest()->getParams();
        $package = new Package(
            $this->getRequest()->getHeader('someapi_bearer_token'),
            $input_params['version'],
            $input_params['command'],
            json_decode($input_params['params'])
        );

        if(!$package->IsFullPackage()) {
            //error package not full
            (new Exception("Error no api version, bearer token or command specified"))->PrintExeptionJSON();
        }

        $auth = new Auth(Mage, $package->get('bearer_token'));
        if(!$auth->IsUserAuthorized()) {
            //error
            (new Exception("Not valid bearer token"))->PrintExeptionJSON();
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
            //error not found command or invalid params
            (new Exception("Not found command in this version api or invalid params"))->PrintExeptionJSON();
        }
    }
}