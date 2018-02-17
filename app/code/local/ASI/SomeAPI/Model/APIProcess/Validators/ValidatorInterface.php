<?php
namespace SomeAPI\conrollers\APIProcess\Validators;

interface ValidatorInterface
{
    //bool return true if params suitable
    public function Validate($params);
}