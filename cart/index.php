<?php

require 'Cart.php';
require 'CartDiscount.php';
require 'CartItem.php';
require 'DiscountSeller.php';
require 'DiscountUser.php';
require 'Customer.php';


$customer = new Customer('John', 'Smith', new DiscountUser());
$cart = new Cart($customer);

$iphone = new CartItem('Iphone 13', 1300);
$airpods = new CartItem('Airpods Pro', 200);

$cart->addItem($iphone);
$cart->addItem($airpods);

$total = $cart->getTotal();

var_dump($total);