<?php

namespace Xlab\Service;

class ProductsTransformer implements ProductsTransformerInterface
{
    /**
     * transforms products list to an html representation
     *
     * @param \Xlab\Product[] $products
     *
     * @return \Xlab\Product[]
     */
    public function transformToHtml(array $products)
    {
        $html = "<ol>\n";
        foreach ($products as $product)
        {
            $html .= sprintf(
                "\t<li%s>%s (%s)</li>\n",
                $product->isPromoted() ? ' class="promoted"' : '',
                $product->getName(),
                $product->getPrice() / 100
            );
        }
        $html .= "</ol>\n";

        return $html;
    }
}
