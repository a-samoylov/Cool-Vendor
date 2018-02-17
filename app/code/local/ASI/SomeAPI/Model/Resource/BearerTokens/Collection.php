<?php
class ASI_SomeAPI_Model_Resource_BearerTokens_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract {

    public function _construct()
    {
        parent::_construct();
        $this->_init('someapi/bearertokens');
    }
}