<?php
//
//namespace Magenest\Movie\Block\Adminhtml\Actor;
//
//use Magento\Backend\Helper\Data;
//use Magento\Backend\Block\Template\Context;
//use Magento\Backend\Block\Widget\Grid\Extended;
//use Magento\Backend\Block\Widget\Grid as WidgetGrid;
//use Magenest\Movie\Model\ResourceModel\Actor\Collection;
//
//class Grid extends Extended
//{
//
//    protected $_actorCollection;
//
//    public function __construct(
//        Context $context,
//        Data $backendHelper,
//        Collection $actorCollection,
//        array $data = []
//    ) {
//        $this->_actorCollection = $actorCollection;
//        parent::__construct($context, $backendHelper, $data);
//        $this->setEmptyText(__('No Actor Found'));
//    }
//
//    protected function _prepareCollection()
//    {
//        $this->setCollection($this->_actorCollection);
//        return parent::_prepareCollection();
//    }
//
//}
