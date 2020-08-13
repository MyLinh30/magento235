<?php

namespace Magenest\Movie\Block\System\Config\Form\Field;
use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class ActorTableField extends Field
{
    protected $_actorCollection;
    public function __construct(
        Context $context,
        \Magenest\Movie\Model\ResourceModel\Actor\Collection $actorCollection,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_actorCollection = $actorCollection;
    }

    protected function _getElementHtml(AbstractElement $element)
    {
        $element->setData('value', $this->_actorCollection->getnumbercolumns());
        $element->setReadonly(true);
        return $element->getElementHtml();
    }
}