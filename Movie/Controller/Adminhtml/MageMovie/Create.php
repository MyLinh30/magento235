<?php

namespace Magenest\Movie\Controller\Adminhtml\MageMovie;

use Magento\Backend\App\Action;

class Create extends \Magento\Backend\App\Action
{
    protected $pageFactory;
    public function __construct(Action\Context $context, \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
        $page = $this->pageFactory->create();
        return $page;
        // TODO: Implement execute() method.
    }

}