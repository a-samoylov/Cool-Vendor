<?php
/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

$installer->run("
    CREATE TABLE IF NOT EXISTS `{$this->getTable('someapi/bearertokens')}` (
        bearer_token_id int(11) NOT NULL AUTO_INCREMENT,
        value varchar(255) DEFAULT NULL,
        PRIMARY KEY (bearer_token_id)
    ) ENGINE = INNODB DEFAULT CHARSET=utf8;
");

$installer->endSetup();

