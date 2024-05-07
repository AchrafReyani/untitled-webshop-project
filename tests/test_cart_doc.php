<?php
include_once "../views/CartDoc.php";
include_once "../sessionManager.php";
$data = array ('page' => 'Cart');
$data = [
    "products" => [
        1 => [
            "id" => "1",
            "name" => "arduino",
            "description" => "description for the arduino uno",
            "price" => "2",
            "image" => "../Images/Arduino.jpg"
        ],
        2 => [
            "id" => "2",
            "name" => "CPE",
            "description" => "description text for the CPE",
            "price" => "50",
            "image" => "../Images/CPE.jpg"
        ],
        3 => [
            "id" => "3",
            "name" => "Kano kit",
            "description" => "kano kit description text",
            "price" => "70",
            "image" => "../Images/Kano.jpg"
        ],
        4 => [
            "id" => "4",
            "name" => "Raspberrypi",
            "description" => "description text for the raspberry pi",
            "price" => "39",
            "image" => "../Images/RPI.jpg"
        ],
        5 => [
            "id" => "5",
            "name" => "Sphero",
            "description" => "sphero description text",
            "price" => "120",
            "image" => "../Images/Sphero.jpg"
        ]
    ],
    "page" => "shop",
    "menu" => [
        "home" => "Home",
        "about" => "About",
        "contact" => "Contact",
        "shop" => "Webshop",
    ]
];
//make shopping cart
$_SESSION['shoppingCart'] = [];
$_SESSION['shoppingCart'][1] = 1;
$_SESSION['shoppingCart'][2] = 1;
$_SESSION['shoppingCart'][3] = 1;
$_SESSION['shoppingCart'][4] = 1;
$_SESSION['shoppingCart'][5] = 1;

$view = new CartDoc($data);
$view -> show();
?>