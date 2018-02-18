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

        } catch(Exception $exception) {
            echo json_encode(array("error" => $exception->getMessage()));
            return;
        }

        $auth = new Auth($package->get('bearer_token'));
        if(!$auth->IsUserAuthorized()) {
            //error
            echo json_encode(array("error" => "Invalid bearer token"));
            return;
        }

        $apiProcess = new APIProcess(
            $package->get('version'),
            $package->get('command'),
            $package->get('params')
        );

        try{
            echo json_encode($apiProcess->startProcessing());
        } catch (Exception $exception) {
            echo json_encode(array("error" => $exception->getMessage()));
            return;
        }
    }
}