<?php
namespace SomeAPI\Model\Definition;

require_once 'APIConfig.php';

use SomeAPI\Model\Definition\APIConfig;

class APIConfigFactory {

    public function __construct() {

    }

    public function create($version, $command) {
        $configs_api = \Mage::getConfig()->getNode('API')->asArray();
        $handler_name = '';
        $validators_names = [];
        $properties_names = [];

        //Get config api from xml
        foreach ($configs_api as $key_api => $api) {
            foreach ($api as $key_api_element => $api_element) {
                if($key_api_element == 'version' && $api_element == $version) {
                    foreach ($api['list_commands'] as $key_api_command => $api_command) {
                        if($api_command['name'] == $command) {
                            $handler_name       = $api_command['handler'];
                            $validators_names   = $api_command['validators'];
                            $properties_names   = $api_command['properties'];
                        }
                    }
                }
            }
        }

        return new APIConfig(
            $handler_name,
            $validators_names,
            $properties_names
        );
    }
}