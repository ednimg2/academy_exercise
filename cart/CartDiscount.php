<?php

class CartDiscount
{
    private  int $percent;
    private string $customerLevel;

    public function __construct(int $percent, string $customerLevel)
    {
        $this->percent = $percent;
        $this->customerLevel = $customerLevel;
    }

    public function getDiscountPercent(): int
    {
        return $this->percent;
    }

    public function getCustomerLevel():  string
    {
        return $this->customerLevel;
    }
}
