<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Price
{
    /**
     * @SerializedName("value")
     */
    private $value;

    /**
     * @SerializedName("currency")
     */
    private $currency;

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param  mixed  $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param  mixed  $currency
     */
    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }
}
