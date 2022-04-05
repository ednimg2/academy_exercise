<?php

class Order {
    public $totalWeight;
    protected $shipping;

    public function getTotalWeight(): float
    {
        return $this->totalWeight;
    }

    public function setTotalWeight(float $weight): self
    {
        $this->totalWeight = $weight;

        return $this;
    }

    public function setShippingType(string $shipping): self
    {
        $this->shipping = $shipping;

        return $this;
    }

    public function getShippingCost()
    {
        if($this->shipping == "ground") {
            return max(10, $this->getTotalWeight() * 1.5);
        }

        if ($this->shipping == "air") {
            return max(20, $this->getTotalWeight() * 3);
        }

        return null;
    }

    public function getShippingDate()
    {
        return $this->shipping;
    }
}
