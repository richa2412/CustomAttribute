<?php
namespace Test\CustomAttribute\Api;

use Test\CustomAttribute\Api\ProductTypeSetterInterface as ApiInterfaceSetter;
use Magento\Catalog\Api\ProductRepositoryInterface;

class ProductTypeSetter implements ApiInterfaceSetter
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

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
            $product = $this->productRepository->get($sku);
            $product->setProductType($productType);
            $this->productRepository->save($product);
            echo "test";
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
