<?php
include_once "../views/HomeDoc.php";
$data = array ('page' => 'Home');
$data['menu'] = array('Home' => 'Home', 'About' => 'About', 'Contact' => 'Contact', 'Webshop' => 'Webshop');
$view = new HomeDoc($data);
$view -> show();
?>