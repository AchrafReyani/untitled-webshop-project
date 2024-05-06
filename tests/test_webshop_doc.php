<?php
include_once "../views/WebshopDoc.php";
$data = array ('page' => 'Webshop');
$data['menu'] = array('Home' => 'Home', 'About' => 'About', 'Contact' => 'Contact', 'Webshop' => 'Webshop');
$view = new WebshopDoc($data);
$view -> show();
?>