<?php

namespace App\Controller;

use App\Domains\PricesDomain;
use App\Domains\ProductsDomain;
use App\Entity\Product;
use App\Services\Engines\Source;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ProductsController extends AbstractController
{


    /**
     * @Route("/products", name="products")
     */
    public function index()
    {
        $products = new ProductsDomain(new Source());
        return $this->json([
            'products' => $products->getAllProducts(),
        ]);
    }

    /**
     * @Route("/product/{id}", name="product")
     */
    public function show($id)
    {

        $product = (new ProductsDomain(new Source()))->getProductById($id);
        $prices = (new PricesDomain(new Source()))->getPricesById($id);

        if ($product instanceof Product){
            $product->setPrices($prices);
        }

        return $this->json([
            'product' => $product,
        ]);

    }

    /**
     * @Route("/product/price/{id}/unit/{unitId}", name="productPrice")
     */
    public function showPrice($id, $unitId)
    {

        $prices = (new PricesDomain(new Source()))->getPricesByCriteria([
            ['id', '=', $id],
            ['unit', '=', $unitId]
        ]);

        return $this->json([
            'price' => $prices->first(),
        ]);
    }
}
