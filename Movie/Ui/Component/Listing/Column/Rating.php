<?php


namespace Magenest\Movie\Ui\Component\Listing\Column;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Rating extends Column
{
    public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, array $components = [], array $data = [])
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $html = '';
                $i=0;
                while($i<10){
                    if($i<$item['rating']){
                        $html .='<img src="https://previews.123rf.com/images/coolvectorstock/coolvectorstock1808/coolvectorstock180803063/106867388-star-vector-icon-isolated-on-transparent-background-star-concept.jpg" width="20" height="20">';
                    }else{
                        $html.= '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Star_empty.svg/589px-Star_empty.svg.png" width="20" height="20">';
                    }
                    $i++;
                }

                $item['rating'] = $html;
            }
        }
        return $dataSource;
    }














//    public function prepareDataSource(array $dataSource)
//    {
//        if (isset($dataSource['data']['items'])) {
//            foreach ($dataSource['data']['items'] as & $item) {
//                if (array_key_exists('rating', $item)) {
//                    try {
//
//                        $item[$this->getData('name')] = html_entity_decode($this->star2Html($item[$this->getData('name')], 5));
//
//                    } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
//
//                    }
//
//                }
//
//            }
//        }
//
//        return $dataSource;
//    }
//
//    private function star2Html(int $quantity, int $max){
//        $result = "";
//        $quantity = $quantity>$max ? $max : $quantity;
//        for ($i = 0; $i < $max; $i++){
//            if ($i < $quantity){
//                $result .= '<span class=\'icon-star-fill\'>&#9733;</span>';
//            }else {
//                $result .= '<span class=\'icon-star-empty\'>&#9733;</span>';
//            }
//        }
//        return $result;
//    }

}
