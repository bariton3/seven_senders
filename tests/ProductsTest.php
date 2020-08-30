<?php


namespace App\Tests;
use App\Domains\ProductsDomain;
use App\Entity\Product;
use App\Services\Engines\Source;
use PHPUnit\Framework\TestCase;


class ProductsTest extends TestCase
{
    public function testExistingProductResult()
    {
        $products = new ProductsDomain(new Source());

        $result = $products->getProductById('BA-01');

        $this->assertInstanceOf(Product::class, $result);
    }

    public function testNotExistingProductResult()
    {
        $products = new ProductsDomain(new Source());

        $result = $products->getProductById('qqqq');

        $this->assertNotTrue($result);
    }
}
