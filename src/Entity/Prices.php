<?php


namespace App\Entity;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Prices
{
    /**
     * @SerializedName("id")
     */
    private $id;


    /**
     * @var Price
     */
    public $price;

    /**
     * @SerializedName("unit")
     */
    private $unit;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  mixed  $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return Price
     */
    public function getPrice(): Price
    {
        return $this->price;
    }

    /**
     * @param  array  $price
     */
    public function setPrice(array $price): void
    {
        $object = new Price();
        foreach ($price as $key => $value)
        {
            $object->{"set".ucfirst($key)}($value);
        }

        $this->price = $object;
    }

    /**
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param  mixed  $unit
     */
    public function setUnit($unit): void
    {
        $this->unit = $unit;
    }

}
