<?php


namespace Magenest\Movie\Controller\Adminhtml\MageMovie;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Ui\Component\MassAction\Filter;
use Magenest\Movie\Model\ResourceModel\MageMovie\CollectionFactory;

class MassDelete extends \Magento\Backend\App\Action
{
    protected $_filter;
    protected $_collectionFactory;
    public function __construct(Action\Context $context,Filter $_filter, CollectionFactory $_collectionFactory)
    {
        $this->_collectionFactory = $_collectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->_filter->getCollection($this->_collectionFactory->create());
        $recordDelete = 0;
        foreach ($collection ->getItems() as $actionCollection)
        {
            $actionCollection ->setId($actionCollection->getEntityId());
            $actionCollection->delete();
            $recordDelete++;

        }
        $this->messageManager->addSuccess(__('Ban da xoa thanh cong'),$recordDelete);
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
        // TODO: Implement execute() method.
    }
}
