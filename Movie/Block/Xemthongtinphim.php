<?php

namespace Magenest\Movie\Block;

use Magenest\Movie\Model\MovieFactory;
use Magento\Framework\View\Element\Template;

class Xemthongtinphim extends Template
{
    private $magemovieFactory;
    public function __construct(
        Template\Context $context,
        \Magenest\Movie\Model\MageMovieFactory $magemovieFactory,

        array $data = [])
    {
        parent::__construct($context, $data);
        $this->magemovieFactory = $magemovieFactory;
    }
    function getMovieInfo(){
        $movieCollection = $this->magemovieFactory
            ->create()
            ->getCollection();

        $movies = $movieCollection->laythongtinphim();
        $res = [];

        foreach($movies as $movie){
            if(in_array($movie['movie_id'],array_column($res,'movie_id'))){
                $index = array_search($movie['movie_id'],array_column($res,'movie_id'));
                $res[$index]['Actor Name'].=' , ' . $movie['Actor Name'];
            }else{
                array_push($res,$movie);
            }
        }
        return $res;


    }


    //    public function getMovie(){
//
//        $collection = $this->magemovieFactory->create();
////        $director = $collection->getTable('magenest_director');
////        $movie_actor = $collection->getTable('magenest_movie_actor');
////
////        $collection
////            ->getSelect()
////            //->reset(Zend_Db_Select::COLUMNS)
////            ->columns('magenest_movie.name as Movie')
////            ->columns('magenest_director.name as Director')
////            ->columns('count(magenest_movie_actor.movie_id) as tongactor')
////            ->join
////            (
////                ['magenest_director'=>$director],
////                'magenest_movie.director_id = magenest_director.director_id'
////            )
////           ->join
////           (
////               ['magenest_movie_actor'=>$movie_actor],
////               'magenest_movie.movie_id = magenest_movie_actor.movie_id'
////           )
////            ->group(array('magenest_movie.name','magenest_director.name'));
//        return $collection->getCollection();
//    }




//    public function getCount(){
//
//    }
//
//    public function getTestQuery()
//    {
//        $select = $this->connection
//            ->select()
//            ->from($this->resource->getTableName('sales_order_item'))
//            ->reset(\Zend_Db_Select::COLUMNS)
//            ->columns(['created_at', new \Zend_Db_Expr('COUNT(`sales_order_item`.`product_id`) as count')])
//            ->group('created_at');
//        ;
//
//        //  SELECT `sales_order_item`.`created_at`, count(`sales_order_item`.`product_id`) FROM `sales_order_item` GROUP BY `created_at`
//        echo (string) $select;
//
//        $data = $this->connection->fetchAll($select);
//        foreach ($data as $item) {
//            // ["created_at"]=>  string(19) "2019-05-16 00:31:50"
//            // ["count"]=> string(1) "2"
//            var_dump($item);
//            die();
//        }
//    }



}
