<?php

namespace Magenest\Movie\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Readonly extends \Magento\Config\Block\System\Config\Form\Field
{

    private $movieCollection;

    public function __construct(\Magento\Backend\Block\Template\Context $context, array $data = [],\Magenest\Movie\Model\ResourceModel\MageMovie\Collection $movieCollection)
    {
        parent::__construct($context, $data);

        $this->movieCollection = $movieCollection;
    }

    protected function _getElementHtml(AbstractElement $element)
    {
        $numbers = $this->movieCollection->getnumbercolumns();
        $element->setData(['readonly'=>'true','value'=>$numbers]);
        return $element->getElementHtml();
    }
}