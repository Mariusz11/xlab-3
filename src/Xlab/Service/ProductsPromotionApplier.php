<?php

namespace Xlab\Service;

use Xlab\Product;

class ProductsPromotionApplier implements ProductsPromotionApplierInterface
{
    /**
     * applies promotion flag to products that price is below 50 zl
     *
     * @param \Xlab\Product[] $products
     *
     * @return \Xlab\Product[]
     */
    public function apply(array $products)
    {
        foreach ($products as $product) {
            if ($product->getPrice() < 5000) {
                $product->promote();
            }
        }

        return $products;
    }
}
