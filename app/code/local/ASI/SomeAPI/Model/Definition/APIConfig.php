<?php
namespace SomeAPI\Model\Definition;

class APIConfig {
    private $configs_api = [];//config api from xml

    public function __construct($configs_api) {
        //Get config api from xml
        foreach ($configs_api as $key_api => $api) {
            foreach ($api as $key_commands => $commands) {
                if($key_commands == 'version'){
                    continue;
                }

                $list_commands = [];

                foreach ($commands as $key_command => $command) {
                    $validators = [];

                    foreach ($command['validators'] as $key_validators => $validator) {
                        $validators[] = $validator;
                    }
                    $list_commands[] = array(
                        'name'       => $command['name'],
                        'handler'    => $command['handler'],
                        'validators' => $validators
                    );
                }
            }

            $this->configs_api[] = array(
                'version'           => $api['version'],
                'list_commands'    => $list_commands
            );
        }
    }

    //TODO Refactoring
    public function GetHandler($version, $command) {
        for ($i = 0; $i < count($this->configs_api); $i++ ) {
            if($this->configs_api[$i]['version'] == $version) {
                for ($j = 0; $j < count($this->configs_api[$i]['list_commands']); $j++ ) {
                    if($this->configs_api[$i]['list_commands'][$j]['name'] == $command) {
                        return $this->configs_api[$i]['list_commands'][$j]['handler'];
                    }
                }
            }
        }

        return '';
    }

    //TODO Refactoring
    public function GetValidators($version, $command) {
        for ($i = 0; $i < count($this->configs_api); $i++ ) {
            if($this->configs_api[$i]['version'] == $version) {
                for ($j = 0; $j < count($this->configs_api[$i]['list_commands']); $j++ ) {
                    if($this->configs_api[$i]['list_commands'][$j]['name'] == $command) {
                        return $this->configs_api[$i]['list_commands'][$j]['validators'];
                    }
                }
            }
        }

        return [];
    }
}