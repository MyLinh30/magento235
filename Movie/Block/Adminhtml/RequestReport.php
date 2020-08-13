<?php


namespace Magenest\Movie\Block\Adminhtml;
use Magento\Framework\View\Element\Template;

class RequestReport extends Template
{
    protected $fullModuleList;
    protected $productCollection;
    protected $invoiceCollection;
    protected $creditmemoCollection;
    protected $customer;
    protected $orderCollection;
    public function __construct(Template\Context $context,
                                \Magento\Framework\Module\FullModuleList $fullModuleList,
                                \Magento\Customer\Model\ResourceModel\Customer\Collection $customer,
                                \Magento\Catalog\Model\ResourceModel\Product\Collection $productCollection,
                                \Magento\Sales\Model\ResourceModel\Order\Invoice\Collection $invoiceCollection,
                                \Magento\Sales\Model\ResourceModel\Order\Creditmemo\Collection $creditmemoCollection,
                                array $data = [])
    {
        $this->fullModuleList = $fullModuleList;
        parent::__construct($context, $data);
        $this->productCollection = $productCollection;
        $this->invoiceCollection= $invoiceCollection;
        $this->creditmemoCollection = $creditmemoCollection;
        $this->customer = $customer;
    }

    public function getAllModule(){
        $all  = $this->fullModuleList->getNames();
        return count($all);
    }
    public function getModuleInstall(){
        $all = $this->fullModuleList->getNames();
        $num = 0;
        foreach ($all as $module){
            $str = substr($module, 0, 8);
            if (strcmp($str, 'Magenest') == 0){
                $num ++;
            }
        }
        return $num;
    }
    public function getNumberCustomer(){
        return $this->customer->count();
    }
    public function getNumberProduct(){
        return $this->productCollection->count();
    }
    public function getNumberInvoice(){
        return $this->invoiceCollection->count();
    }
    public function getNumberCreditmemo(){
        return $this->creditmemoCollection->count();
    }

}
