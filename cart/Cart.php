<?php


class Cart
{
    private Customer $customer;
    private array $cartItem;
    private array $cartDiscount;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function addItem(CartItem $cartItem)
    {
        $this->cartItem[] = $cartItem;
    }

    public function getItems(): array
    {
        return $this->cartItem;
    }

    public function addDiscount(CartDiscount $cartDiscount)
    {
        $this->cartDiscount[] = $cartDiscount;
    }

    public function getTotal()
    {
        return array_reduce(
            $this->cartItem,
            function (?int $totalPrice, CartItem $item) {
                $totalPrice += ($item->getPrice() * (100 - $this->customer->getDiscountPercent())) / 100;

                return $totalPrice;
            }
        );
    }
}
