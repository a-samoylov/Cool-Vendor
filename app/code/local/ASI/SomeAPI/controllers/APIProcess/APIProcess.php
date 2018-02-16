<?php
//из-за namespace ошибка ппри добавлении Mage.php
//namespace SomeAPI\conrollers\APIProcess;

require_once('.\app\Mage.php');
define('ROOT', Mage::getBaseDir());

require_once ROOT . '\app\code\local\ASI\SomeAPI\controllers\Definition\APIConfig.php';
require_once 'Validators\FactoryValidators.php';
require_once 'Handlers\FactoryHandler.php';

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

    //return array or if exeption false
    public function StartProcessing() {
        if($this->handler == '') {
            //error no handler
            return false;
        }

        //create validators
        $validators = (new SomeAPI\conrollers\APIProcess\Validators\FactoryValidators())
            ->Create($this->validators);
        foreach ($validators as $key => $validator) {
            if(!$validator->Validate($this->params)) {
                //error validate
                return false;
            }
        }

        //create handler
        $handler =(new SomeAPI\conrollers\APIProcess\Handlers\FactoryHandler())->create($this->handler);
        return $handler->Run($this->params);
    }
}