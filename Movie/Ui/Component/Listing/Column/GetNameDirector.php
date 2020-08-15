<?php


namespace Magenest\Movie\Ui\Component\Listing\Column;


use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magenest\Movie\Model\ResourceModel\Director\Collection;

class GetNameDirector extends Column
{
     protected $directorCollection;
     public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, Collection $directorCollection , array $components = [], array $data = [])
     {
         $this->directorCollection=$directorCollection;
         parent::__construct($context, $uiComponentFactory, $components, $data);
     }
     public function prepareDataSource(array $dataSource)
     {
         if (isset($dataSource['data']['items'])) {
             foreach ($dataSource['data']['items'] as &$item) {
                 $collection = $this->directorCollection->getItems();
                 foreach ($collection as $col){
                     if($item['director_id']== $col->getId()){
                         $item['director_id']=html_entity_decode("<p>".$col->getName()."</p>");
                     }

                 }


//                 if ($item['director_id'] == 1) {
//                     $item['director_id'] = html_entity_decode("<p>Director 1</p>");
//                 }
//                 if ($item['director_id'] == 2) {
//                     $item['director_id'] = html_entity_decode("<p>Director 2</p>");
//                 }
//                 if ($item['director_id'] == 3) {
//                     $item['director_id'] = html_entity_decode("<p>Director 3</p>");
//                 }


             }
         }
         return $dataSource;
     }
}
