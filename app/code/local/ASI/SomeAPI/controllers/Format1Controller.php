<?php

define('ROOT', Mage::getBaseDir() . '\app\code\local\ASI\SomeAPI\Model');
require_once ROOT . '\Auth\Auth.php';
require_once ROOT . '\Package\Package.php';
require_once ROOT . '\APIProcess\APIProcess.php';
require_once ROOT . '\Definition\APIConfig.php';
//require_once ROOT . '\Exception\Exception.php';
require_once ROOT . '\Package\PackageFormat1Factory.php';

use \SomeAPI\Model\APIProcess\APIProcess;
use \SomeAPI\Model\Auth\Auth;
use \SomeAPI\Model\Package\PackageFormat1Factory;
//use \SomeAPI\Model\Exception\Exception;

class ASI_SomeAPI_Format1Controller extends Mage_Core_Controller_Front_Action {
    public function indexAction() {


        try {
            $input_params = $this->getRequest()->getParams();
            $package = (new PackageFormat1Factory)->create(
                '123',//$this->getRequest()->getHeader('someapi_bearer_token'),
                $input_params
            );

        } catch(Exception $exception) {//Mage_Core_Exception $e
            //new (Exception($exception->getMessage())->PrintExeptionJSON();
        }



        $auth = new Auth(Mage, $package->get('bearer_token'));
        if(!$auth->IsUserAuthorized()) {
            //error
            //(new Exception("Not valid bearer token"))->PrintExeptionJSON();
        }
die("asd");
        $apiProcess = new APIProcess(
            Mage,
            $package->get('version'),
            $package->get('command'),
            $package->get('params')
        );

        $response = $apiProcess->startProcessing();
        if(is_array($response)) {
            echo json_encode($response);
        } else {
            //error not found command or invalid params
            (new Exception("Not found command in this version api or invalid params"))->PrintExeptionJSON();
        }
    }
}