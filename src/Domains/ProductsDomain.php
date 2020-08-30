<?php


namespace App\Domains;


use App\Entity\Product;
use App\Entity\Products;
use App\Services\Engines\SourceInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Expr\Comparison;

/**
 * Class DomainProducts
 * @package App\Domains
 */
class ProductsDomain
{
    /**
     * @var SourceInterface
     */
    public $source;

    /**
     * ProductsController constructor.
     * @param  SourceInterface  $source
     */
    public function __construct(SourceInterface $source)
    {
        $this->source = $source;
    }

    /**
     * @return ArrayCollection
     */
    public function getAllProducts(): ArrayCollection
    {
        $products = $this->source->getData('products.xml', Products::class, 'xml');

        return $products->collection;
    }

    /**
     * @param $id
     * @return Product|false
     */
    public function getProductById($id)
    {
        $expr = new Comparison('sku', '=', $id);

        $criteria = new Criteria();

        $criteria->where($expr);

        //$f = $this->getAllProducts()->matching($criteria)->isEmpty();

        return $this->getAllProducts()->matching($criteria)->first();
    }
}
