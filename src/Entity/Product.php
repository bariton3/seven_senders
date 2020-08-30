<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Product
{
    /**
     * @SerializedName("id")
     */
    private $id;

    /**
     * @SerializedName("name")
     */
    private $name;

    /**
     * @SerializedName("description")
     */
    private $description;

    /**
     * @SerializedName("sku")
     */
    private $sku;

    /**
     * @SerializedName("prices")
     */
    private $prices;

    /**
     * @param  mixed  $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): self
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @param  mixed  $prices
     */
    public function setPrices($prices): void
    {
        $this->prices = $prices;
    }
}
