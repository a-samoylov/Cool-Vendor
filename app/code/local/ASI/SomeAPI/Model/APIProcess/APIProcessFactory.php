<?php
namespace SomeAPI\Model\APIProcess;

require_once 'APIProcess.php';

use SomeAPI\Model\Definition\APIConfig;

class APIProcessFactory {

    public function __construct() {

    }

    public function create($version, $command, $params) {

        $api_configs = new APIConfig(
            \Mage::getConfig()->getNode('API')->asArray()
        );

        return new APIProcess(
            $api_configs->getHandler($version, $command),
            $api_configs->getValidators($version, $command),
            $params
        );
    }
}