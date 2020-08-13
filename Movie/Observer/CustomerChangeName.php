<?php

namespace Magenest\Movie\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
class CustomerChangeName implements ObserverInterface
{
    private $logger;
    protected $_customerRepositoryInterface;
    public function __construct(\Psr\Log\LoggerInterface $logger,
                                \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface)
    {
        $this->logger = $logger;
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function execute(Observer $observer)
    {
        //$this->logger->debug('Change Name Success');
        $customer = $observer->getCustomerDataObject();
        $customerId = $customer->getId();
        $customerData = $this->_customerRepositoryInterface->getById($customerId);
        $customerData->setFirstName('Magenest');
        return $this;
    }

}