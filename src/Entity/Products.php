<?php


namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\MaxDepth;

class Products
{
    /**
     * @var Product[]
     * @MaxDepth(1)
     */

    public $collection;

    public function __construct()
    {
        $this->collection = new ArrayCollection();
    }

    /**
     * @return Product[]
     */
    public function getProduct(): array
    {
        return $this->collection;
    }

    /**
     * @param  array  $products
     */
    public function setProduct(array $products): void
    {
        foreach ($products as $product){
            $object = new Product();
            foreach ($product as $key => $value)
            {
                $object->{"set".ucfirst(preg_replace("/[^a-zA-Z]/", "", $key))}($value);
            }

            $this->collection->add($object);
        }
    }
}
