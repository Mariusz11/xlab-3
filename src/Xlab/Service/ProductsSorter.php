<?php

namespace Xlab\Service;

use Xlab\Product;

class ProductsSorter implements ProductsSorterInterface
{
    /**
     * sorts products by price and then by name and returns sorted products list
     *
     * @param \Xlab\Product[] $products
     *
     * @return \Xlab\Product[]
     */
    public function sort(array $products)
    {
        //usort sortuje po liczbie
        usort($products, function (Product $productA, Product $productB) {
            if($productA->getPrice() === $productB->getPrice()){
                //strnatcmp sortuje alfabetycznie
                return strnatcmp($productA->getName(), $productB->getName());
            }
                return $productA->getPrice() > $productB->getPrice() ? 1 : -1;


        });



        return $products;
    }


}
