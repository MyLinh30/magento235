<?php

namespace Magenest\Movie\Model;

use Magenest\Movie\Model\ResourceModel\MageMovie\CollectionFactory;

/**
 * Class DataProvider
 */
class MovieDataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    public function __construct($name, $primaryFieldName, $requestFieldName, CollectionFactory $collectionFactory, array $meta = [], array $data = [])
    {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
}