<?php

class Vehicle
{
    public $brand;
    public $color;
    public function honk()
    {
        echo "Honking!" . PHP_EOL . "<br>";
    }
}
class Car extends Vehicle
{
    public $model;

    public function drive()
    {
        echo "Driving $this->brand and this color $this->color" . " ,$this->model" . "<br>" . PHP_EOL;
    }
}

class Bicycle extends Vehicle
{
    public $seri;

    public function drive1()
    {
        echo "Xe Đạp $this->brand and this color: $this->color , is seri:$this->seri " . PHP_EOL;
    }
}

$car = new Car();

$car->brand = "TOYOTA";
$car->model = "C400";
$car->color = "Green";

$car->honk();
$car->drive();


$car1 = new Bicycle();
$car1->seri = "209873";
$car1->brand = "Shimano";
$car1->color = "Black";

$car1->drive1();
