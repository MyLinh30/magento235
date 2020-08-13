<?php

namespace Magenest\Movie\Model\ResourceModel;

class Director extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function __construct(\Magento\Framework\Model\ResourceModel\Db\Context $context)
    {
        parent::__construct($context);
    }
    public function _construct()
    {
        // TODO: Implement _construct() method.
        $this->_init('magenest_director','director_id');
    }
}