<?php


namespace Magenest\DemoKnockout\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactoryFactory)
    {
        $this->resultPageFactory = $resultPageFactoryFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }

}

