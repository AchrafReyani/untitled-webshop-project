<?php
include_once "../views/DetailDoc.php";
$data = array ('page' => 'Detail');
$data = [
    "product" => [
       
            "id" => "1",
            "name" => "arduino",
            "description" => "description for the arduino uno",
            "price" => "2",
            "image" => "../Images/Arduino.jpg"
      
    ],
    "page" => "shop",
    "menu" => [
        "home" => "Home",
        "about" => "About",
        "contact" => "Contact",
        "shop" => "Webshop",
    ],
    "allowedToBuy" => true
];
$view = new DetailDoc($data);
$view -> show();
?>