<?php

require 'DiscountInterface.php';

class DiscountSeller implements DiscountInterface
{
    public function getDiscount(): int
    {
        return 20;
    }
}