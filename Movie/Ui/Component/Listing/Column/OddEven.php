<?php

namespace Magenest\Movie\Ui\Component\Listing\Column;


use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use \Magento\Ui\Component\Listing\Columns\Column;


class OddEven extends Column
{
    public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, array $components = [], array $data = [])
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
              if($item["entity_id"]%2==0)
              {
                 $item['oddeven'] = html_entity_decode("<p class='grid-severity-minor' >Even</p>");
                  //$item['oddeven']= 1;
              }
              else {
                  $item['oddeven'] = html_entity_decode("<p class='grid-severity-notice'>Odd</p>");
                  //$item['oddeven'] = 2;
              }
            }
        }
        return $dataSource;
    }

}
