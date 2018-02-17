<?php
class ASI_SomeAPI_Model_Resource_BearerTokens extends Mage_Core_Model_Mysql4_Abstract {

    public function _construct()
    {
        $this->_init('someapi/bearertokens','bearer_token_id');
    }

}