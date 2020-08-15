<?php


namespace Magenest\Movie\Controller\Adminhtml\Report;


use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Load extends \Magento\Backend\App\Action
{

    protected $resultPageFactory;
    public function __construct(Action\Context $context,PageFactory $resultPageFactory)
    {
        $this->resultPageFactory=$resultPageFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Request Report')));
        return $resultPage;
        // TODO: Implement execute() method.
    }
}
