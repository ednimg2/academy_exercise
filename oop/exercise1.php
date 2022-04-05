<?php

/*
    Exercise #1
    Sukurkite klasių hierarchiją. Cart, CartItem, CartDiscount, Customer.

    Cart:
    metodai:
    __construct(Customer $customer)
    addItem(CartItem $cartItem) - turi leisti pridėti CartItem objektą. Galite saugoti CartItem'us masyve, klasės Cart viduje
    addDiscount(CartDiscount $cartDiscount) - turi leisti pridėti CartDiscount objektus
    getTotal() - turi grąžinti visą krepšelio sumą su pritaikytomis nuolaidomis. Suapvalinkite iki 2 skaičių po kablelio
    Skaičiuojant total nuolaidos sumuojasi. Turi būti pritaikomos tik tos nuolaidos, kurių customerLevel sutampa su krepšelio
    kliento leveliu,

    CartDiscount
    metodai:
    __construct(int $percent, string $userLevel)
    getDiscountPercent() - nuolaidos procentas pvz.: 15
    getCustomerLevel() - gali būti 'A', 'B' arba 'C'

    CartItem
    metodai:
    __construct(string $name, int $price)
    getName() - prekės pavadinimas pvz.: 'Iphone 13'
    getPrice() - prekė kaina pvz.: 1300 (naudokite int)

    Customer
    metodai:
    __construct(string $name, string $surname, string $level)
    getFullName()
    getLevel() - gali būti 'A', 'B' arba 'C'

    Kaip turėtų būti kviečiamas kodas:
    <?php
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
    $cartDiscount3 = new CartDiscount(20, 'B');
    $cart->addDiscount($cartDiscount2);

    $total = $cart->getTotal();
    var_dump($total); // 1249.5
 */

/*
 * Exercise #2
 *
 * Sukurti programa, kuri moketu paduotą objektą Car konvertuoti į json, csv ir išsaugoti į failą.
 *
 * class Car
 * properties:
 * - string $name
 * - DateTime $year
 * - string $color
 * - int $power
 *
 * metodai:
 * - __construct(* all properties *)
 * - getData
 *
 * JsonConverter, CsvConverter, FileProcessing
 *
 * $status = new FileProcessing(new Car, new JsonConverter);
 */

/*
 * Exercise #3
 * Sukurkite programą skirtą valdyti parkingą. Naudokite objektinį programavimą t.y. klases.
 * Turbūt pakaks dviejų klasių - Parking ir Car. Duomenys turi būti saugomi faile.
 * ---------------------------------------------
 * php -f parking.php park_car NKA_123
 * Car ABC_123 parked!
 * ---------------------------------------------
 * php -f parking.php park_car FTA_122
 * Car FTA_122 parked!
 * ---------------------------------------------
 * php -f parking.php list_cars
 * Parked cars:
 * NKA_123
 * FTA_122
 *
 */

