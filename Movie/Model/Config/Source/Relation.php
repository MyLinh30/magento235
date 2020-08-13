<?php

namespace Magenest\Movie\Model\Config\Source;

class Relation implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {

        // TODO: Implement toOptionArray() method.
        return [
            [
                'value'=>null,
                'label'=>__('--Select Option--')
            ],
            [
                'value'=> 1,
                'label'=>__('Show')
            ],
            [
                'value'=> 2,
                'label' => __('Not_Show')
            ]
        ];
    }

}