<?php

namespace Magenest\Movie\Model\Config\Backend;

class Custom extends \Magento\Framework\App\Config\Value
{
    protected $_configValueFactory;

//    public function __construct(\Magento\Framework\App\Config\ValueFactory $configValueFactory)
//    {
//        $this->_configValueFactory = $configValueFactory;
//    }

    public function __construct(\Magento\Framework\Model\Context $context, \Magento\Framework\Registry $registry, ScopeConfigInterface $config, \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList, \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null, \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null, array $data = [])
    {
        parent::__construct($context, $registry, $config, $cacheTypeList, $resource, $resourceCollection, $data);
    }

    public function afterSave()
    {
        $value = $this->getValue('field_config/label');
        if ($value == 'Ping') {
            $this->_configValueFactory->create()->setValue('Pong')->save();
            return parent::afterSave();
        }
    }

}
