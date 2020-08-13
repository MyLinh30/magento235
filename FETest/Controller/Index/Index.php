<?php


namespace Magenest\FETest\Controller\Index;
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
        //echo "xin chao";
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }

}
