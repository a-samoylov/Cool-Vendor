<?php
//namespace SomeAPI\conrollers\APIProcess;

require_once('.\app\Mage.php');
define('ROOT', Mage::getBaseDir());

require_once ROOT . '\app\code\local\ASI\SomeAPI\controllers\Definition\APIConfig.php';

class APIProcess {
    private $handler;
    private $validators;
    private $params;

    public function __construct($version, $command, $params) {
        $api_configs = new SomeAPI\conrollers\Definition\APIConfig(
            Mage::getConfig()->getNode('API')->asArray()
        );

        $this->params       = $params;
        $this->handler      = $api_configs->GetHandler($version, $command);
        $this->validators   = $api_configs->GetValidators($version, $command);
    }

    //bool
    public function StartProcessing() {
        //TODO
        //$api = $value = Mage::getConfig()->getNode('API');
        //var_dump($api);

        return [];
    }
}