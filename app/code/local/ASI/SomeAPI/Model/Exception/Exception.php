<?php
namespace SomeAPI\conrollers\Exception;

class Exception {
    public $error;

    public function __construct($text) {
        $this->error = $text;
    }

    public function PrintExeptionJSON() {
        die(json_encode($this));
    }

    public function PrintExeptionXML($Mage) {
        die($Mage::helper('someapi')->arrayToXml(
            array(
                'error' => $this->error)
            )
        );
    }
}