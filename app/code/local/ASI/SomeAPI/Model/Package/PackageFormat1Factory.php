<?php
namespace SomeAPI\Model\Package;

use Couchbase\Exception;

require_once 'Package.php';

class PackageFormat1Factory {

    public function __construct() {

    }

    public function create($bearer_token, $paramsPackage) {
        if(!$bearer_token) {
            //throw new Exception('Invalid bearer token');
        }

        if($paramsPackage['version'] == '') {
            //throw new Exception('Invalid bearer version');
        }

        if($paramsPackage['command'] == '') {
            //throw new Exception('Invalid bearer command');
        }

        return new Package(
            $bearer_token,
            $paramsPackage['version'],
            $paramsPackage['command'],
            json_decode($paramsPackage['params'])
        );
    }
    
}