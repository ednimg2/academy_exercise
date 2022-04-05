<?php

class DiscountUser implements DiscountInterface
{
    public function getDiscount(): int
    {
        return 10;
    }
}
