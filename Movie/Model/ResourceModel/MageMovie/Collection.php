<?php

namespace Magenest\Movie\Model\ResourceModel\MageMovie;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    private $_movie_table = 'main_table';
    private $_director_table = 'magenest_director';
    private $_actor_table = 'magenest_actor';
    private $_movie_actor_table = 'magenest_movie_actor';


    public function _construct()
    {
        $this->_init('Magenest\Movie\Model\MageMovie', 'Magenest\Movie\Model\ResourceModel\MageMovie');
    }
    public function laythongtinphim()
    {
        $select_thuoctinh_movie = ['name'];
        $select_name_direactor = ['Director Name' => $this->_director_table.'.name'];
        $select_name_actor = ['Actor Name' => $this->_actor_table.'.name'];
        $query = $this->addFieldToSelect($select_thuoctinh_movie)
            ->getSelect()
            ->join($this->_director_table, $this->_movie_table . '.director_id = ' . $this->_director_table . '.director_id', $select_name_direactor)
            ->join($this->_movie_actor_table, $this->_movie_actor_table . '.movie_id = ' . $this->_movie_table . '.movie_id', [])
            ->join($this->_actor_table, $this->_movie_actor_table . '.actor_id = ' . $this->_actor_table . '.actor_id', $select_name_actor);

        $data = $this->getConnection()->fetchAll($query);
        return $data;
    }

    public function getnumbercolumns(){
        $total = $this->getConnection()->fetchOne($this->getSelectCountSql());
        return $total;
    }



}

