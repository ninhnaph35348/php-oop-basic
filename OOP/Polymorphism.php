<?php

class Product
{
    public function price()
    {
        echo "This price of this product is :  " . PHP_EOL;
    }
}

class Laptop extends Product
{
    public function price()
    {
        echo "Laptop is 200000" . PHP_EOL;
    }
}

class Phone extends Product
{
    public function price()
    {
        echo "Phone is 100000" . PHP_EOL;
    }
}


echo "<pre>";

$laptop = new Laptop();

$laptop->price();


$Phone = new Phone();

$Phone->price();
