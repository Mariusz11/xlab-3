<?php

namespace Xlab\Service;

use Xlab\Product;

class ProductsTransformerTest extends \PHPUnit_Framework_TestCase
{
	protected $productsTransformer;

	public function setUp()
	{
		$this->productsTransformer = new ProductsTransformer();
	}

	public function testSortProducts()
	{
		$product1 = new Product(1999, 'Warcraft 3');
		$product2 = new Product(5999, 'World of Warcraft');

		$products = array($product1, $product2);

		$html = $this->productsTransformer->transformToHtml($products);

		$this->assertSame(
			'<html><body><div>Warcraft 3 (19.99)</div><div>World of Warcraft (59.99)</div></body></html>',
			str_replace(["\n", "\t"], '', $html),
			'Products are transformed to HTML'
		);
	}
}