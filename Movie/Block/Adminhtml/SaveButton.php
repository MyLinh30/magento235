<?php

namespace Magenest\Movie\Block\Adminhtml;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends \Magento\Catalog\Block\Adminhtml\Product\Edit\Button\Generic implements ButtonProviderInterface
{

    public function getButtonData()
    {
        return [
            'label' => __('Save Movie'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}