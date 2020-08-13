<?php

namespace Magenest\Movie\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class ConfigChange implements ObserverInterface
{
    private $_scopeConfig;
    private $_configWriter;

    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, \Magento\Framework\App\Config\Storage\WriterInterface $configWriter)
    {
        $this->_scopeConfig = $scopeConfig;
        $this->_configWriter = $configWriter;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        if (strcmp($this->_scopeConfig->getValue('movie/magenest_page/txt_field'), 'Ping') == 0) {
            $this->_configWriter->save('movie/magenest_page/txt_field', 'Pong');
        }
        return $this;

    }


}