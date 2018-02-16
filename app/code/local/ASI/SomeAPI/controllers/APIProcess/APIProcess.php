<?php
namespace SomeAPI\conrollers\APIProcess;

require_once 'Validators/FactoryValidators.php';
require_once 'Handlers/FactoryHandler.php';

use SomeAPI\conrollers\APIProcess\Handlers\FactoryHandler;
use SomeAPI\conrollers\APIProcess\Validators\FactoryValidators;
use SomeAPI\conrollers\Definition\APIConfig;

class APIProcess {
    private $handler;
    private $validators;
    private $params;

    public function __construct($Mage, $version, $command, $params) {
        $api_configs = new APIConfig(
            $Mage::getConfig()->getNode('API')->asArray()
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
        $f = new FactoryValidators();

        $validators = (new FactoryValidators())->Create($this->validators);

        foreach ($validators as $key => $validator) {
            if(!$validator->Validate($this->params)) {
                //error validate
                return false;
            }
        }

        //create handler
        $handler =(new FactoryHandler())->create($this->handler);
        return $handler->Run($this->params);
    }
}