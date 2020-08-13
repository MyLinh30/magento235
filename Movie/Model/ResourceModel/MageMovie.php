<?php

namespace Magenest\Movie\Model\ResourceModel;

class MageMovie extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    public function _construct() {
        $this->_init('magenest_movie',
                     'movie_id');
    }

}


