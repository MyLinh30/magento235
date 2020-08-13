<?php

namespace Magenest\Movie\Controller\Adminhtml\MageMovie;
use Magento\Backend\App\Action;

class Save extends \Magento\Backend\App\Action
{
    public function __construct(Action\Context $context)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        // 1. POST request : Get booking data

//        try {
            $data = (array)$this->getRequest()->getPost();
            //$data = $this->getRequest()->getPostValue();
            $movie = $this->_objectManager->create('Magenest\Movie\Model\MageMovie');
            $movie->setData($data);
            $movie->save();



            $this->_eventManager->dispatch('movie_save_after', ['movie'=>$movie]);

//        } catch (\Exception $exception) {
//            if ($exception->getCode() == 23000) {
//                $this->messageManager->addErrorMessage("Director_id does not exist in director table. pls add new director first");
//                $this->_redirect('movie/movie/create');
//                return;
//            } else {
//                $this->messageManager->addErrorMessage("Something wrong. pls try again");
//                $this->_redirect('movie/movie/create');
//                return;
//            }
//        }
        $this->messageManager->addSuccess(__('Data saved!'));
        $this->_redirect('magenest/magemovie/index');
        return;
    }


}