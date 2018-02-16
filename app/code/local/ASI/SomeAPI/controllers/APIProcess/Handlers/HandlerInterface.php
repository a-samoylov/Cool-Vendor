<?php
namespace SomeAPI\conrollers\APIProcess\Handlers;

interface HandlerInterface
{
    public function Run($Mage, $params);
}