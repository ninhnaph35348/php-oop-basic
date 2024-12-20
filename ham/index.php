<?php

"<pre>";

// hàm không tham số 
function sayHello()
{
    echo "Hello!!!" . "<br>";
}

sayHello();

// Hàm có tham số

function sayHello1($hello)
{
    echo " Anii $hello";
}

sayHello1('Hello mọi người nhé!!!!' . "<br>");


// Hàm không có giá trị trả về 

function sayHello2($name)
{
    echo "Xin chào , $name" . "<br>";
}

sayHello2(name: "Anii");

// Hàm có giá trị trở về : return 

function sayHello3($name, $age)
{
    return "Xin chào $name , $age tuổi!!!" . "<br>";
}

echo sayHello3('Aniii', 20);



// Hàm ẩn danh : cho phép use 1 biến bên ngoài vào trong nó 
$age = 20;

$sayHello4 = function ($name) use ($age) {
    return "Xin chào $name , $age Tuổi!!!" . "<br>";
};

echo $sayHello4("Anii");


//Sử dụng hàm được đặt tên làm callback
function sayHello5()
{
    echo "Hello, Anii";
}

function executeCallback($callback)
{
    if (is_callable($callback)) {
        $callback();
    } else {
        echo "hàm callback không hợp lệ!" . "<br>";
    }
}

echo executeCallback('sayHello5' . "<br>");


// Sử dụng hàm ẩn danh làm callback

function processArray($array, $callback)
{
    foreach ($array as $value) {
        echo $callback($value)  . "<br>";
    }
}

processArray([1, 2, 3, 4, 5], function ($num) {
    return $num * 2;
});


// Hàm tham trị : mọi thay đổi với tham số trong hàm không ảnh hưởng đến biến ban đầu
echo "Hàm tham trị" . "<br>";


function soDem($value)
{
    $value++;
}

$num = 5;
soDem($num);
echo $num . "<br>";

echo "Hàm tham Chiếu" . "<br>";

// Hàm tham chiếu : mọi thay đổi với tham số trong hàm đều ảnh hưởng tới biến ban đầu , kí hiệu để chuyền tham chiếu là: '&'
function soDem1(&$value)
{
    $value++;
}

$num = 5;
soDem1($num);
echo $num . "<br>";


// Hàm callback

function hello()
{
    echo "HELLO NHEN!!";
}

function callback($callback)
{
    echo $callback();
}

echo callback("hello");
