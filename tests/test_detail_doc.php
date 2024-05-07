<?php
include_once "../views/DetailDoc.php";
$data = array ('page' => 'Detail');
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
$view = new DetailDoc($data);
$view -> show();
?>