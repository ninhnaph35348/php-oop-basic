<?php

abstract class Shape
{
    abstract protected function getArea();
}

class Circle extends Shape
{

    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }
    public function getArea()
    {
        return pi() * $this->radius * $this->radius;
    }
}


class Square extends Shape
{
    private $cach;

    public function __construct($cach)
    {
        $this->cach = $cach;
    }

    public function getArea()
    {
        return pow($this->cach, 2);
    }
}

$circle = new Circle(3);
$square = new Square(5);
echo "Diện tích hình Tròn = " . $circle->getArea() . "<br>";
echo "Diện tích hình Vuông = " . $square->getArea();
