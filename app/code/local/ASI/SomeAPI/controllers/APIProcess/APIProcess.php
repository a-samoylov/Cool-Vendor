<?php
namespace SomeAPI\conrollers\APIProcess;

class APIProcess {
    private $handler;
    private $validators = [];
    private $canProcessing;

    public function __construct($version, $command, $params) {

        //var_dump($value = Mage::getConfig()->getNode('API'));
    }

    //bool
    public function StartProcessing() {
        //TODO
        return [];
    }
}