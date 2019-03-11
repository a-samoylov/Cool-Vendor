<?php

namespace SomeAPI\Model\APIProcess;

require_once 'APIProcess.php';

use SomeAPI\Model\Definition\APIConfigFactory;

class APIProcessFactory
{

    public function __construct()
    {
    }

    public function create($version, $command, $params)
    {
        $api_configs = (new APIConfigFactory())->create(
            $version,
            $command
        );

        //merge params with properties in configs
        foreach ($api_configs->getProperies() as $key_property => $property) {
            if (!isset($params->$key_property)) {
                $params->$key_property = $property;
            }
        }

        return new APIProcess(
            $api_configs->getHandler(),
            $api_configs->getValidators(),
            $params
        );
    }
}
