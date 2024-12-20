<?php

echo "<pre>";

// $array = ['Nguyễn', 'An', 'Ninh'];

// print_r($array);

// $array1 = [1, 2, 3];

// print_r($array1);

// $array2 = ['Anii', 20];

// print_r($array2);

// $array3 = [
//     'Cáa',
//     20,
//     [
//         "Anii",
//         21,
//         [
//             1,
//             2,
//             3
//         ]
//     ]
// ];

// // print_r($array3);


// foreach ($array3 as $key => $value) {
//     echo "\n KEY: $key" . PHP_EOL;
//     print_r($value);
// }

// Hàm trong mảng

// Hàm count(): Đếm số phần tử trong mảng
// $books = ['Hạ Đỏ', 'Mùa hè không tên', 'Mắt biếc'];

// echo count($books);

// // Hàm array_push(): Thêm 1 hoặc nhiều phần tử vào cuối mảng
// array_push($books, 'Có con mèo ngồi bên cửa sổ', 'Tôi thấy hoa vàng trên cỏ xanh');

// print_r($books);

// // array_pop(): Xóa và trả về phần tử cuối mảng

// $lastBook = array_pop($books);
// print_r($books);

// // array_merge(): Hợp nhất 2 hoặc nhiều mảng

// $books2 = [
//     'Albert Camus' => 'Kẻ Ngoài Cuộc',
//     'Nguyễn Nhật Ánh' => "Ngồi khóc trên cây",
//     2
// ];

// $allBook = array_merge($books, $books2);

// print_r($allBook);


// // in_array() Kiểm tra xem một giá trị có tồn tại trong mảng hay không

// if (in_array('Hạ Đỏ', $books)) {
//     echo 'Có sách Hạ Đỏ nè!!!' . "<br>";
// } else {
//     echo 'Không có đâu nhé!!!' . "<br>";
// }

// // array_key() Lấy tất cả các khóa trong mảng
// $keys = array_keys($books2);
// print_r($keys);

// // array_values() Lấy tất cả giá trị của mảng

// $values = array_values($books2);
// print_r($values);

// //array_search() Tìm từ khóa của 1 giá trị trong mảng

// $key = array_search("Mắt biếc", $books);
// echo $key;


// // array_column() Lấy ra giá trị của một cột mong muốn
// $books3 = [
//     [
//         'id' => 1,
//         'author' => 'Nguyễn Nhật Ánh',
//         'book' => "Ngồi khóc trên cây",
//     ],
//     [
//         'id' => 2,
//         'author' => 'Nguyễn Nhật Ánh',
//         'book' => "Hạ đỏ",
//     ],
//     [
//         'id' => 3,
//         'author' => 'Nguyễn Nhật Ánh',
//         'book' => "Mùa hè không tên",
//     ],
// ];

// $book = array_column($books3, "book");

// print_r($book);


// // unset() Xóa 1 phần tử của mảng theo key

// unset($books3[2]);
// print_r($books3);


// // implode() Chuyển mảng thành chuỗi
// $book_implode = implode(", ", $books);
// echo $book_implode;


// $books = [
//     [
//         'id' => 1,
//         'author' => 'Nguyễn Nhật Ánh',
//         'name' => "Ngồi khóc trên cây",
//     ],
//     [
//         'id' => 2,
//         'author' => 'Nguyễn Nhật Ánh',
//         'name' => "Hạ đỏ",
//     ],
//     [
//         'id' => 3,
//         'author' => 'Nguyễn Nhật Ánh',
//         'name' => "Mùa hè không tên",
//     ],
// ];
// echo "Sản phẩn ban đầu";
// print_r($books);
// // $product = [];
// function AddBook(&$books, $id, $author, $book)
// {
//     $books[] = [
//         'id' => $id,
//         'author' => $author,
//         'name' => $book
//     ];
// }

// echo 'Sản phẩm sau khi thêm mới';
// AddBook($books, 4, 'NgNhatAnh', "Sách Bác Ánh");

// print_r($books);


// function delete(&$books, $id)
// {
//     foreach ($books as $key => $book) {
//         if ($book["id"] == $id) {
//             unset($books[$key]);
//             break;
//         }
//     }
// }

// // delete($books, 4);
// // print_r($books);

// function detail(&$books, $name)
// {
//     foreach ($books as $book) {
//         if (strcasecmp($book["name"], $name) == 0) {
//             return $book;
//         }
//     }
//     return null;
// }
// echo "Sản phẩm tìm với tên Hạ Đỏ" . "<br>";
// $book = detail($books, 'Hạ đỏ');
// print_r($book);

// Mảng chỉ số
$array = [1, 4, 3];
// Mảng kết hợp
$array1 = [
    'name' => 'Anii',
    'age' => 20
];
// Mảng đã chiều
$array2 = [
    'name' => 'Anii',
    'age' => 20,
    'book' => [
        '1' => 'Tiệm sách của nàng',
        '2' => 'hạ đỏ'
    ]
];


print_r($array);
print_r($array1);
print_r($array2);
