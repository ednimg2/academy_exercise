<?php

class Customer
{
    private string $name;
    private string $surname;
    private DiscountInterface $discountPercent;


    public function __construct(string $name, string $surname, DiscountInterface $discountPercent)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->discountPercent = $discountPercent;
    }

    public function getFullName(): string
    {
        return sprintf('%s %s', $this->name, $this->surname);
    }

    public function getDiscountPercent(): int
    {
        return $this->discountPercent->getDiscount();
    }
}
