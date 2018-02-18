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

class ASI_SomeAPI_Format2Controller extends Mage_Core_Controller_Front_Action {
    public function indexAction() {

        /*$Mage::helper('someapi')->arrayToXml(
        array(
            'error' => $this->error)
        )*/


        /*$dataPOST = trim(file_get_contents('php://input'));
        $dataPOST = json_decode($dataPOST);

        $package = new Package(
            $this->getRequest()->getHeader('someapi_bearer_token'),
            $dataPOST->version,
            $dataPOST->command,
            $dataPOST->params
        );


        if(!$package->IsFullPackage()) {
            //error package not full
            (new Exception("Error no api version, bearer token or command specified"))->PrintExeptionXML(Mage);
        }

        $auth = new Auth(Mage, $package->get('bearer_token'));
        if(!$auth->IsUserAuthorized()) {
            //error
            (new Exception("Not valid bearer token"))->PrintExeptionXML(Mage);
        }

        $apiProcess = new APIProcess(
            Mage,
            $package->get('version'),
            $package->get('command'),
            $package->get('params')
        );

        $response = $apiProcess->StartProcessing();
        if(is_array($response)) {
            echo Mage::helper('someapi')->arrayToXml($response);
        } else {
            //error not found command or invalid params
            (new Exception("Not found command in this version api or invalid params"))->PrintExeptionXML(Mage);
        }*/
    }
}