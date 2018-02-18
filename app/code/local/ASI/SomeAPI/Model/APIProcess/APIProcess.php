<?php
namespace SomeAPI\Model\APIProcess;

require_once 'Handlers/HandlerFactory.php';
require_once 'Validators/ValidatorFactory.php';

use SomeAPI\Model\APIProcess\Handlers\HandlerFactory;
use SomeAPI\Model\APIProcess\Validators\ValidatorFactory;
use SomeAPI\Model\Definition\APIConfig;

class APIProcess {
    private $handler_name;
    private $validators_names = [];
    private $params;

    public function __construct($version, $command, $params) {
        $api_configs = new APIConfig(
            \Mage::getConfig()->getNode('API')->asArray()
        );

        $this->params               = $params;
        $this->handler_name         = $api_configs->getHandler($version, $command);
        $this->validators_names     = $api_configs->getValidators($version, $command);
    }

    //return array or if exeption false
    public function startProcessing() {
        foreach ($this->validators_names as $key => $validatorsName) {
            $validator = (new ValidatorFactory())->create($validatorsName);
            if(!$validator->validate($this->params)) {
                //error validate
                throw new \Exception('Invalid params');
            }
        }

        //create handler
        $handler = (new HandlerFactory())->create($this->handler_name);
        return $handler->run($this->params);
    }
}