<?php

class ASI_SomeAPI_Block_Button extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $this->setElement($element);
        $url = $this->getUrl('someapi/mail');

        $html = $this->getLayout()->createBlock('adminhtml/widget_button')
                     ->setType('button')
                     ->setClass('scalable')
                     ->setLabel('Send report')
                     ->setOnClick("setLocation('$url')")
                     ->toHtml();

        return $html;
    }
}
?>
