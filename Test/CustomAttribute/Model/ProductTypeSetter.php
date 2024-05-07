<?php

namespace Test\CustomAttribute\Model;

use Test\CustomAttribute\Api\ProductTypeSetterInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;

class ProductTypeSetter implements ProductTypeSetterInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * ProductTypeSetter constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function setProductType($sku, $productType)
    {
        try {
            // Fetch the product by SKU
            $product = $this->productRepository->get($sku);
            
            // Set the product type attribute
            $product->setData('product_type',$productType);
            
            // Save the product
            $this->productRepository->save($product);
            
            return true;
        } catch (\Exception $e) {
            // Handle exceptions
            return false;
        }
    }
}
