<?php
class ASI_SomeAPI_Model_Resource_Block extends Mage_Core_Model_Mysql4_Abstract {

    public function _construct()
    {
        $this->_init('someapi/block','bearer_token_id');
    }

}