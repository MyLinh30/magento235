<?php

namespace Magenest\Movie\Controller\Adminhtml\Actor;

use Magento\Backend\App\Action;

class Index extends \Magento\Backend\App\Action
{
    protected $resultFactory;
    public function __construct(Action\Context $context, \Magento\Framework\View\Result\PageFactory $resultFactory)
    {
        parent::__construct($context);
        $this->resultFactory= $resultFactory;
    }
    public function execute()
    {
        // TODO: Implement execute() method.
        $page = $this->resultFactory->create();
        $page->getConfig()
            ->getTitle()
            ->prepend((__('Actor')));
        return $page;
    }

}