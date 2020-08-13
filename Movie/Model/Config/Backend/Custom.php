<?php

namespace Magenest\Movie\Model\Config\Backend;

class Custom extends \Magento\Framework\App\Config\Value
{
    protected $_configValueFactory;
    public function __construct(\Magento\Framework\App\Config\ValueFactory $configValueFactory){
          $this->_configValueFactory = $configValueFactory;
        }
    public function afterSave()
    {
        $value = $this->getValue('field_config/label') ;
        if($value =='Ping') {
            $this->_configValueFactory->create()->setValue('Pong')->save();

            return parent::afterSave();
        }
    }

}