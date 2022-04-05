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

    public function getDiscountPercent(): int
    {
        return array_reduce(
            array_filter(
                $this->cartDiscount,
                function (CartDiscount $discount) {
                    return ($discount->getCustomerLevel() === $this->customer->getLevel());
                }
            ),
            function (?int $discount, CartDiscount $cartDiscount) {
                $discount += $cartDiscount->getDiscountPercent();

                return $discount;
            }
        );
    }

    public function getTotal()
    {
        return array_reduce(
            $this->cartItem,
            function (?int $totalPrice, CartItem $item) {
                $totalPrice += ($item->getPrice() * (100 - $this->getDiscountPercent())) / 100;

                return $totalPrice;
            }
        );
    }
}

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

class CartItem
{
    private string $name;
    private int $price;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}

class Customer
{
    private string $name;
    private string $surname;
    private string $level;

    public function __construct(string $name, string $surname, string $level)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->level = $level;
    }

    public function getFullName(): string
    {
        return sprintf('%s %s', $this->name, $this->surname);
    }

    public function getLevel(): string
    {
        return $this->level;
    }
}

interface Discount
{
    public function getDiscount();
}

class DiscountUser implements Discount
{
    public function getDiscount(): int
    {
        return 10;
    }
}

class DiscountSeller implements Discount
{
    public function getDiscount(): int
    {
        return 20;
    }
}

$customer = new Customer('John', 'Smith', 'A');
$cart = new Cart($customer);

$iphone = new CartItem('Iphone 13', 1300);
$airpods = new CartItem('Airpods Pro', 200);

$cart->addItem($iphone);
$cart->addItem($airpods);

$cartDiscount1 = new CartDiscount(15, 'A');
$cart->addDiscount($cartDiscount1);

$cartDiscount2 = new CartDiscount(2, 'A');
$cart->addDiscount($cartDiscount2);

$cartDiscount3 = new CartDiscount(20, 'C');
$cart->addDiscount($cartDiscount3);

$total = $cart->getTotal();

var_dump($total);