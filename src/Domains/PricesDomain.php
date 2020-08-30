<?php


namespace App\Domains;


use App\Entity\Products;
use App\Services\Engines\SourceInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Expr\Comparison;

/**
 * Class PricesDomain
 * @package App\Domains
 */
class PricesDomain
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
    public function getAllPrices(): ArrayCollection
    {
        $prices = $this->source->getData('prices.json', '\App\Entity\Prices[]', 'json');

        return new ArrayCollection($prices);
    }

    /**
     * @param $id
     * @return array
     */
    public function getPricesById($id): array
    {
        $criteria = new Criteria();
        $expr = new Comparison('id', '=', $id);
        $criteria->where($expr);

        return $this->getAllPrices()->matching($criteria)->toArray();
    }


    /**
     * @param  array  $arrayCriteria
     * @return ArrayCollection
     */
    public function getPricesByCriteria(array $arrayCriteria): ArrayCollection
    {
        $criteria = new Criteria();

        foreach ($arrayCriteria as $criterion){
            $criteria->andWhere(new Comparison($criterion[0], $criterion[1], $criterion[2]));
        }

        return $this->getAllPrices()->matching($criteria);
    }
}
