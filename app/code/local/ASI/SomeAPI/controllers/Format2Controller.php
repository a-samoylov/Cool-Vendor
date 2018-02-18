<?php
define('ROOT', Mage::getBaseDir() . '\app\code\local\ASI\SomeAPI\Model');
require_once ROOT . '\Auth\AuthFactory.php';
require_once ROOT . '\Package\Package.php';
require_once ROOT . '\APIProcess\APIProcessFactory.php';
require_once ROOT . '\Definition\APIConfigFactory.php';
require_once ROOT . '\Package\PackageFormat2Factory.php';

use \SomeAPI\Model\Package\PackageFormat2Factory;
use \SomeAPI\Model\Auth\AuthFactory;
use \SomeAPI\Model\APIProcess\APIProcessFactory;

class ASI_SomeAPI_Format2Controller extends Mage_Core_Controller_Front_Action {
    public function indexAction() {
        try {
            $dataPOST = trim(file_get_contents('php://input'));

            $package = (new PackageFormat2Factory)->create(
                $this->getRequest()->getHeader('someapi_bearer_token'),
                $dataPOST
            );
        } catch (Exception $exception) {
            echo Mage::helper('someapi')->arrayToXml(array('error' => $exception->getMessage()));
            return;
        }

        $auth = (new AuthFactory())->create($package->get('bearer_token'));
        if(!$auth->isUserAuthorized()) {
            //error
            echo Mage::helper('someapi')->arrayToXml(array('error' => "Invalid bearer token"));
            return;
        }

        try {
            $apiProcess = (new APIProcessFactory())
                ->create(
                    $package->get('version'),
                    $package->get('command'),
                    $package->get('params')
                );

            echo Mage::helper('someapi')->arrayToXml($apiProcess->startProcessing());
        } catch (Exception $exception) {
            echo Mage::helper('someapi')->arrayToXml(array('error' => $exception->getMessage()));
            return;
        }
    }
}