<?php

namespace Magenest\Movie\Observer;

use Magenest\Movie\Model\MageMovie;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\ObjectManagerInterface;

class MovieChangeRating implements ObserverInterface
{

    private $movieModel;

    public function __construct(MageMovie $movie)
    {
        $this->movieModel = $movie;
    }

    public function execute(Observer $observer)
    {
//        $movie = $this->_objectManager->create('Magenest\Movie\Model\MageMovie');
//        $movie->load($observer->getMovie());
        $movie = $observer->getData('movie');
        if ($movie->getRating() != 0) {
            $movie->setRating(0);
            $movie->save();
        }
        return $this;
        // TODO: Implement execute() method.
    }
}