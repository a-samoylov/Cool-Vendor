<?php
namespace SomeAPI\Model\APIProcess;

require_once 'Handlers/HandlerFactory.php';
require_once 'Validators/ValidatorsFactory.php';

use SomeAPI\conrollers\APIProcess\Handlers\HandlerFactory;
use SomeAPI\conrollers\APIProcess\Validators\ValidatorsFactory;
use SomeAPI\conrollers\Definition\APIConfig;

class APIProcess {
    private $handler;
    private $validators;
    private $params;
    private $Mage;

    public function __construct($Mage, $version, $command, $params) {
        $this->Mage = $Mage;
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
        $validators = (new ValidatorsFactory())->Create($this->validators);

        foreach ($validators as $key => $validator) {
            if(!$validator->Validate($this->params)) {
                //error validate
                return false;
            }
        }

        //create handler
        $handler = (new HandlerFactory())->create($this->handler);
        return $handler->Run($this->Mage, $this->params);
    }
}