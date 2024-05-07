<?php
namespace Test\CustomAttribute\Observer;

use Exception;
use Magento\Framework\Event\ObserverInterface;

class ReplaceProductImage implements ObserverInterface
{
    protected $_productRepository;

    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
    ) {
        $this->_productRepository = $productRepository;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        
        $product = $observer->getProduct();
        $productId = $product->getId();
        $productType = $product->getData('product_type');
       
        // Check if the product type is 'Custom'
        if ($productType == '1') {
           //print_r($productId);
           //exit;
            // Replace product image with the specified URL
            /*$imageUrl = 'https://test.pircosmetics.com/pub/media/wysiwyg/pexels-photo-270348.jpeg';
            $product->addImageToMediaGallery(
                $imageUrl,
                ['image', 'small_image', 'thumbnail'],
                false,
                false
            );*/
            $product->save();
        }

    }
}