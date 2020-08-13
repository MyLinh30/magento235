<?php

namespace Magenest\EavTest\Block;

use Magento\Framework\UrlInterface;
use Magento\Customer\Model\SessionFactory;
use Magento\Framework\View\Element\Template;

class CustomerInfo extends Template
{
    //private $_customerCollectionFactory;
    protected $storeManager;
    protected $customerSession;
    protected $session;
    protected $customerModel;
    public function __construct(Template\Context $context,SessionFactory $customerSession, \Magento\Customer\Model\Customer $customerModel,\Magento\Store\Model\StoreManagerInterface $storeManager,\Magento\Customer\Model\Session $session, array $data = [])
    {
        $this->storeManager = $storeManager;
        $this->session = $session;
        $this->customerSession = $customerSession->create();
        $this->customerModel = $customerModel;
        parent::__construct($context, $data);
    }
    public function getBaseUrl()
    {
        return $this->storeManager->getStore()->getBaseUrl();
    }

    public function getMediaUrl()
    {
        return $this->getBaseUrl() . 'pub/media/';
    }

    public function getCustomerImageUrl($filePath)
    {
        return $this->getMediaUrl() . 'customer' . $filePath;
    }

    public function getFileUrl()
    {
        $customerData = $this->customerModel->load($this->customerSession->getId());
        $url = $customerData->getData('avatar_customer');
        if (!empty($url)) {
            return $this->getCustomerImageUrl($url);
        }
        return false;
    }
    public function getCustomer()
    {
       $result = $this->session->getCustomer();
       $info = $result->getData();
       $data['name'] = $info['firstname']." ". $info['lastname'];
       $data['email'] = $info['email'];
       $data['phone'] = isset($info['phone']) ? $info['phone'] : "Customer No Phone";
//       $data['url'] = $info['avatar_customer'];
       return $data;

    }
}