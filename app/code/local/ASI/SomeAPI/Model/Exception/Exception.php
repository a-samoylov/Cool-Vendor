<?php
namespace SomeAPI\Model\Exception;

class Exception {
    public $error;

    public function __construct($text) {
        $this->error = $text;
    }

    public function PrintExeptionJSON() {
        die(json_encode($this));
    }

    public function PrintExeptionXML($Mage) {

    }
}