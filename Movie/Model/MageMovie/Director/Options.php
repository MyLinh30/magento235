<?php

namespace Magenest\Movie\Model\MageMovie\Director;

use Magento\Framework\Option\ArrayInterface;
use Magenest\Movie\Model\ResourceModel\Director\Collection;
use Magenest\Movie\Model\ResourceModel\Director\CollectionFactory;

class Options implements ArrayInterface
{

    protected $directorCollectionFactory;


    public function __construct(CollectionFactory $directorCollectionFactory)
    {
        $this->directorCollectionFactory = $directorCollectionFactory;
    }

    public function toOptionArray()
    {
        $directorCollection = $this->directorCollectionFactory->create();
        /** @var Collection $directorCollection */
        $allDirectors = $directorCollection
            ->addFieldToSelect(['director_id','name']);

//        $options = array('value'=>null,
//                         'label'=>__('--Select Option--'));
        foreach ($allDirectors as $director){
            $options[] = ['value'=>$director['director_id'],'label'=>$director['name']];
        }
        return  $options;
    }
}
