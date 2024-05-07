<?php

namespace Test\CustomAttribute\Api;

interface ProductTypeSetterInterface
{
    /**
     * Set product type based on SKU
     *
     * @param string $sku
     * @param string $productType
     * @return bool
     */
    public function setProductType($sku, $productType);
}
