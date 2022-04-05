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
    private Discount $discountPercent;


    public function __construct(string $name, string $surname, Discount $discountPercent)
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

$customer = new Customer('John', 'Smith', new DiscountUser());
$cart = new Cart($customer);

$iphone = new CartItem('Iphone 13', 1300);
$airpods = new CartItem('Airpods Pro', 200);

$cart->addItem($iphone);
$cart->addItem($airpods);

$total = $cart->getTotal();

var_dump($total);