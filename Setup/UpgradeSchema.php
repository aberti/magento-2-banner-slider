<?php

namespace Mageplaza\BannerSlider\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

/**
 * Class UpgradeSchema
 * @package Mageplaza\BannerSlider\Setup
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '2.0.1', '<')) {
            $setup->getConnection()->addColumn(
                $setup->getTable('mageplaza_bannerslider_slider'),
                'ignore_location',
                [
                    'type' => Table::TYPE_SMALLINT,
                    'nullable' => true,
                    'comment' => 'Ignore setting for position'
                ]
            );
        }

        $setup->endSetup();
    }
}
