<?php

namespace Magenest\Movie\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $pageFactory;
    protected $magemovieFactory;


    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magenest\Movie\Model\MageMovieFactory $magemovieFactory


    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->magemovieFactory = $magemovieFactory;

    }

    public function execute()
    {
         $page = $this->pageFactory->create();
         return $page;
//        $movie = $this->magemovieFactory->create();
//        $collection = $movie->getCollection();
//        foreach ($collection as $item) {
//            echo "<pre>";
//            print_r($item->getData());
//            echo "</pre>";
//        }
//
//        return $movie;
    }
}