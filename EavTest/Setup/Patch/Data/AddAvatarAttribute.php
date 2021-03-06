<?php

namespace Magenest\EavTest\Setup\Patch\Data;

use Magento\Customer\Model\Customer;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Eav\Model\Config;
use Psr\Log\LoggerInterface;
use Magento\Framework\Setup\Patch\PatchInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;

class AddAvatarAttribute implements DataPatchInterface, PatchRevertableInterface
{
    private $moduleDataSetup;
    private $eavSetupFactory;
    private $productCollectionFactory;
    private $logger;
    private $eavConfig;
    private $attributeResource;
    public function __construct(EavSetupFactory $eavSetupFactory,
                                Config $eavConfig,
                                LoggerInterface $logger,
                                \Magento\Customer\Model\ResourceModel\Attribute $attributeResource,
                                \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
        $this->logger = $logger;
        $this->attributeResource = $attributeResource;
        $this->moduleDataSetup = $moduleDataSetup;
    }
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        $this->addAvatarAttribute();
        $this->moduleDataSetup->getConnection()->endSetup();
    }
    public function addAvatarAttribute(){
        $eavSetup = $this->eavSetupFactory->create();
        $eavSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY,'avatar_customer',['type' => 'text',
                                                                                            'label' => 'Logo Image Avatar',
                                                                                            'input' => 'image',
                                                                                            "source" => '',
                                                                                            'required' => false,
                                                                                            'default' => '0',
                                                                                            'visible' => true,
                                                                                            'user_defined' => true,
                                                                                            'sort_order' => 999,
                                                                                            'position' => 999,
                                                                                            'system' => false,
        ]);
        $attributeSetId = $eavSetup->getDefaultAttributeSetId(Customer::ENTITY);
        $attributeGroupId = $eavSetup->getDefaultAttributeGroupId(Customer::ENTITY);

        $attribute = $this->eavConfig->getAttribute(Customer::ENTITY, 'avatar_customer');
        $attribute->setData('attribute_set_id', $attributeSetId);
        $attribute->setData('attribute_group_id', $attributeGroupId);

        $attribute->setData('used_in_forms', [
            'adminhtml_customer','customer_account_create', 'customer_account_edit','frontend_customer'
        ]);

        $this->attributeResource->save($attribute);
    }
    public static function getDependencies()
    {
        // TODO: Implement getDependencies() method.
        return [];
    }

    public function getAliases()
    {
        // TODO: Implement getAliases() method.
        return [];
    }

    public function revert()
    {
        // TODO: Implement revert() method.
    }
}