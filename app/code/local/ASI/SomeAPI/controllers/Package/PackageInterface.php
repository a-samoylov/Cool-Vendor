<?php
namespace SomeAPI\conrollers\Package;

interface PackageInterface
{
    public function set($key, $value);
    public function get($key);
    public function IsFullPackage();
}