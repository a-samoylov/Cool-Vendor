<?php
namespace SomeAPI\conrollers\Package;

require_once 'PackageInterface.php';

class Package implements PackageInterface {

    private $store = [];
    private $isFullPackage = true;
    private $isCreatedPackage = false;

    public function __construct($bearer_token, $version, $command, $params) {
        $this->store['bearer_token'] = $bearer_token;
        $this->store['version']      = $version;
        $this->store['command']      = $command;
        $this->store['params']       = $params;

        if( $bearer_token    == false ||
            $bearer_token    == '' ||
            $version         == '' ||
            $command         == ''
        ) {
            $isFullPackage = false;
        }
        $isCreatedPackage = true;
    }

    public function set($key, $value){
        $this->store[$key] = $value;
    }

    public function get($key){
        if ($this->IsFullPackage()) {
            return $this->store[$key];
        }
    }

    public function IsFullPackage(){
        return this.isCreatedPackage && this.isFullPackage;
    }
}