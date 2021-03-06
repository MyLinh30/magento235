<?php

namespace Magenest\Movie\Plugin\Model\Checkout\Cart;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\ConfigurableProduct\Model\Product\Type\Configurable;
class Add
{
    private $storeManager;
    private $productRepository;
    protected $configurable;
    public function __construct(StoreManagerInterface $storeManager, ProductRepositoryInterface $productRepository,Configurable $configurable)
    {
        $this->storeManager = $storeManager;
        $this->productRepository = $productRepository;
        $this->configurable = $configurable;
    }
    public function aroundExecute(\Magento\Checkout\Controller\Cart\Add $subject, \Closure $proceed )
    {
        $productId = (int)$subject->getRequest()->getParam('product'); // lay ra id cua san pham =48
        if ($product = $this->initProduct($productId)) {
            if ($product->getTypeId() == Configurable::TYPE_CODE) {
                $params = $subject->getRequest()->getParams();
                $childProduct = $this->configurable->getProductByAttributes($params['super_attribute'], $product);
                if ($childProduct->getId()) {
                    $params['product'] = $childProduct->getId();
                    $subject->getRequest()->setParams($params);
                }
            }
        }
        return $proceed();
    }
    protected function initProduct($productId)
    {
        if ($productId) {
            $storeId = $this->storeManager->getStore()->getId();
            try {
                return $this->productRepository->getById($productId, false, $storeId);
            } catch (NoSuchEntityException $e) {
                return false;
            }
        }
        return false;
    }
}