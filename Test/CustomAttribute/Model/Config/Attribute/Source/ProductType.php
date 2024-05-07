<?php
namespace Test\CustomAttribute\Model\Config\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class ProductType extends AbstractSource
{
    public function getAllOptions()
    {
        return [
            ['value' => '0', 'label' => __('Standard')],
            ['value' => '1', 'label' => __('Custom')],
        ];
    }
}
